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

class PlayerGameEvent extends GameEvent
{
	/** @var Player */
	public $player;

	public function __construct( PluginBase $plugin, Player $player )
	{
		parent::__construct( $plugin );
	}
}