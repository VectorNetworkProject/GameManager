<?php
/**
 * Created by PhpStorm.
 * User: UramnOIL
 * Date: 2018/08/31
 * Time: 20:31
 */

namespace VectorNetworkProject\GamaManager\Event;

use pocketmine\event\plugin\PluginEvent;
use pocketmine\plugin\Plugin;
use VectorNetworkProject\GameManager\IGame;

class GameEvent extends PluginEvent
{
	/** @var IGame */
	private $game;
	public function __construct( Plugin $plugin, IGame $game )
	{
		parent::__construct( $plugin );
		$this->game = $game;
	}

	/**
	 * @return IGame
	 */
	public function getGame() : IGame
	{
		return $this->game;
	}
}