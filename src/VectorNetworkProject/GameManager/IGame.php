<?php
/**
 * Created by PhpStorm.
 * User: UramnOIL
 * Date: 2018/08/31
 * Time: 20:02
 */

namespace VectorNetworkProject\GameManager;


use pocketmine\Player;

interface IGame
{
	public function getName(): string;
	public function onPlayerEntry( Player $player ): bool;
	public function onPlayerQuit( Player $player ): void;
	public function getPlayers();
	public function contains( Player $player ): bool;
}