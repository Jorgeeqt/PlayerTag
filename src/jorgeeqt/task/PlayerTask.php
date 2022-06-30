<?php

namespace jorgeeqt\task;

use jorgeeqt\PlayerTag;

use jorgeeqt\libs\jorgeeqt\CpsCounter;

use jorgeeqt\libs\device\DeviceModel;

use pocketmine\player\Player;

use pocketmine\scheduler\Task;

use pocketmine\Server;

use pocketmine\utils\TextFormat;

class PlayerTask extends Task {

  

    private $plugin;

  

    public function __construct(PlayerTag $plugin)

    {

       $this->plugin = $plugin;

    }

  

    public function onRun(): void

    {

  	  foreach(Server::getInstance()->getOnlinePlayers() as $player){  	  {

            $cps = (int)CpsCounter::getInstance()->getCps($player);

            $device = DeviceModel::getInstance()->getDeviceOS($player);

            $controlls = DeviceModel::getInstance()->getInput($player);

            $ping = $player->getNetworkSession()->getPing();

            

           //$stringL = TextFormat::colorize(str_replace(["{cps}", "{device}", "{controlls}", "{ping}", "{health}", "{line}"], [(int)CpsCounter::getInstance()->getCps($player), DeviceModel::getInstance()->getDeviceOS($player), DeviceModel::getInstance()->getInput($player), $player->getNetworkSession()->getPing(), $player->getHealth(), TextFormat::EOL]) PlayerTag::getInstance()->getConfig()->get("tag_player")));

           $tag = TextFormat::EOL . TextFormat::GREEN . $device . TextFormat::GRAY . " | " . TextFormat::GREEN . $controlls . TextFormat::EOL.

           TextFormat::BOLD.TextFormat::GRAY. "( " .TextFormat::RESET . TextFormat::GREEN . "CPS: " . TextFormat::WHITE . $cps . TextFormat::GRAY . " - " . TextFormat::WHITE . $ping . TextFormat::GREEN . "ms" . TextFormat::BOLD . TextFormat::GRAY . " )";

      

           $player->setScoreTag($tag);

        }

    }

}

?>
