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
use VectorNetworkProject\GamaManager\Event\GameManagerEvent;
use VectorNetworkProject\GameManager\IGame;

class PlayerGameManagerEvent extends GameManagerEvent
{
	/** @var Player */
	private $player;

	public function __construct(PluginBase $plugin, Player $player, IGame $game)
	{
		parent::__construct($plugin, $game);
		$this->player = $player;
	}

	/**
	 * @return Player
	 */
	public function getPlayer(): Player
	{
		return $this->player;
	}
}