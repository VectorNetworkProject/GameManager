<?php
/**
 * Created by PhpStorm.
 * User: UramnOIL
 * Date: 2018/08/31
 * Time: 20:01
 */

namespace VectorNetworkProject\GameManager;


class GameManager
{
	
	public $games;
	public function registerGame( IGame $game )
	{
		if (isset($this->games[$name]) {
			throw new GameAlreadyRegisteredException( $name );
		}
		$this->games[ $name ] = $name;
	}
}