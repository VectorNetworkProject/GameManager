<?php
/**
 * Created by PhpStorm.
 * User: UramnOIL
 * Date: 2018/08/31
 * Time: 20:24
 */

namespace VectorNetworkProject\GameManager\Event;

use pocketmine\event\Cancellable;
use pocketmine\event\plugin\PluginEvent;

class PlayerEntryGameEvent extends PlayerGameEvent implements Cancellable
{
}