<?php
/**
 * Created by PhpStorm.
 * User: UramnOIL
 * Date: 2018/09/01
 * Time: 17:12
 */

namespace VectorNetworkProject\GameManager\Command;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\utils\InvalidCommandSyntaxException;
use pocketmine\plugin\PluginBase;

class GameListCommand extends Command implements IGameManagerCommand
{
	public static const NAME = 'gamelist';
	public static const DESCRIPTION = 'ゲーム一覧を表示します';
	public static const USAGE_MESSAGE = null;
	public static const ALIASES = ['gl'];
	public static const PERMISSION = 'vnp.command.gamelist';

	public function __construct( PluginBase $plugin )
	{
		parent::__construct( self::NAME, self::DESCRIPTION, self::USAGE_MESSAGE, self::PERMISSION );
		$this->setPermission( self::PERMISSION );
	}

	public function execute( CommandSender $sender, string $commandLabel, array $args )
	{
		if( !$this->testPermissionSilent($sender) )
		{
			return;
		}

		$success = true;
		if( !$success )
		{
			throw new InvalidCommandSyntaxException();
		}


	}
}