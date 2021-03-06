<?php
/**
 * Created by PhpStorm.
 * User: UramnOIL
 * Date: 2018/08/31
 * Time: 20:01
 */

namespace VectorNetworkProject\GameManager;


use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Utils;
use VectorNetworkProject\GameManager\Command\GameListCommand;
use VectorNetworkProject\GameManager\Event\PlayerEntryGameEvent;
use VectorNetworkProject\GameManager\Event\PlayerQuitGameEvent;

class GameManager extends PluginBase
{

	/** @var IGame[] */
	private $games;

	protected function onEnable()
	{
		foreach(
		[
			new GameListCommand( $this )
		] as $command )
		{
			$this->getServer()->getCommandMap()->register( 'gamemanager', $command );
		}
	}

	/**
	 * @param string $game
	 *
	 * @throws GameAlreadyRegisteredException
	 */
	public function registerGame(string $game): void
	{
		Utils::testValidInstance($game, IGame::class);
		/** @var IGame $game */
		$game = new $game();
		if (isset($this->games[$game->getName()])) {
			throw new GameAlreadyRegisteredException($game->getName());
		}
		$this->games[$game->getName()] = $game;
	}

	/**
	 * @param IGame $game
	 *
	 * @throws GameNotRegisteredException
	 */
	public function unregisterGame(IGame $game): void
	{
		if (!isset($this->games[$game->getName()])) {
			throw new GameNotRegisteredException($game->getName());
		}
		unset($this->games[$game->getName()]);
	}

	public function getGames(): array
	{
		return $this->games;
	}

	/**
	 * @param Player $player
	 * @param string $game
	 * @param bool $force
	 *
	 * @return bool
	 * @throws GameNotRegisteredException
	 */
	public function playerEntry(Player $player, string $game, bool $force): bool
	{
		if (!$player->hasPermission("vnp.game.entry")) {
			return false;
		}

		if (isset($this->games[$game])) {
			throw new GameNotRegisteredException($game);
		}
		$game = $this->games[$game];

		$entryEvent = new PlayerEntryGameEvent($this, $player, $game);
		$this->getServer()->getPluginManager()->callEvent($entryEvent);

		if ($entryEvent->isCancelled()) {
			return false;
		}

		foreach ($this->games as $game) {
			if ($game->contains($player)) {
				continue;
			}
			if ($force) {
				$QuitEvent = new PlayerQuitGameEvent($this, $player, $game);
				$this->getServer()->getPluginManager()->callEvent($QuitEvent);
				$game->onPlayerQuit($player);
				break;
			} else {
				return false; //エントリーのキャンセル
			}
		}

		$game->onPlayerEntry($player);

		return true;
	}

	public function playerQuit(Player $player): bool
	{
		foreach ($this->games as $game) {
			if ($game->contains($player)) {
				continue;
			}

			$QuitEvent = new PlayerQuitGameEvent($this, $player, $game);
			$this->getServer()->getPluginManager()->callEvent($QuitEvent);
			$game->onPlayerQuit($player);
			return true;
		}

		return false;
	}
}