<?php

namespace jorgeeqt;

use jorgeeqt\libs\device\DeviceModel;
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;

class PlayerListener implements Listener {
	
	public function onPlayerJoin(PlayerJoinEvent $ev): void 
    {
    	$player = $ev->getPlayer();
		$device = $player->getPlayerInfo()->getExtraData()["DeviceOS"];
        $input = $player->getPlayerInfo()->getExtraData()["CurrentInputMode"];
            
        DeviceModel::getInstance()->setDevice($player->getName(), ["DeviceOS" => DeviceModel::getInstance()->getListDevices()[$device]]);
        DeviceModel::getInstance()->setDevice($player->getName(), ["CurrentInputMode" => DeviceModel::getInstance()->getListInputs()[$input]]);
    }
}
?>