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

class GameEvent extends PluginEvent
{
	public function __construct( Plugin $plugin )
	{
		parent::__construct( $plugin );
	}
}