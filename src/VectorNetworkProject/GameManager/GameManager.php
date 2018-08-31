<?php
/**
 * Created by PhpStorm.
 * User: UramnOIL
 * Date: 2018/08/31
 * Time: 20:01
 */

namespace VectorNetworkProject\GameManager;


use pocketmine\Player;
use VectorNetworkProject\GameManager\Event\PlayerQuitGameEvent;

class GameManager
{
	/** @var IGame[] */
	private $games;

	/**
	 * @param IGame $game
	 *
	 * @throws GameAlreadyRegisteredException
	 */
	public function registerGame( IGame $game ): void
	{
		if( isset( $this->games[ $game->getName() ] ) )
		{
			throw new GameAlreadyRegisteredException( $game->getName() );
		}
		$this->games[ $game->getName() ] = $game;
	}

	/**
	 * @param IGame $game
	 *
	 * @throws GameNotRegisteredException
	 */
	public function unregisterGame( IGame $game ): void
	{
		if( !isset( $this->games[ $game->getName() ] ) )
		{
			throw new GameNotRegisteredException( $game->getName() );
		}
		unset( $this->games[ $game->getName() ] );
	}

	public function getGames(): array
	{
		return $this->games;
	}

	public function playerEntry( Player $player, string $name, bool $force ): bool
	{
		foreach( $this->games as $game )
		{
			if( $game->contains( $player ) )
			{
				if( $force )
				{
					$event = new PlayerQuitGameEvent(  );
				}
				else	//エントリーの拒否
				{
					return false;
				}
			}
		}
	}

	public function playerQuit( Player $player ): void
	{

	}
}