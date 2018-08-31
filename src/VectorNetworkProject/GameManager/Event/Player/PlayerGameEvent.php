<?php
/**
 * Created by PhpStorm.
 * User: UramnOIL
 * Date: 2018/08/31
 * Time: 20:49
 */

namespace VectorNetworkProject\GameManager\Event;


use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use VectorNetworkProject\GamaManager\Event\GameEvent;
use VectorNetworkProject\GameManager\IGame;

class PlayerGameEvent extends GameEvent
{
	/** @var Player */
	private $player;
	private $game;

	public function __construct( PluginBase $plugin, Player $player, IGame $game )
	{
		parent::__construct( $plugin );
		$this->player = $player;
		$this->game = $game;
	}

	/**
	 * @return Player
	 */
	public function getPlayer() : Player
	{
		return $this->player;
	}

	/**
	 * @return IGame
	 */
	public function getGame() : IGame
	{
		return $this->game;
	}
}