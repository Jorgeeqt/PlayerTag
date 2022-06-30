<?php

namespace jorgeeqt;

use jorgeeqt\event\PlayerListener;
use jorgeeqt\libs\device\DeviceModel;
use jorgeeqt\libs\jorgeeqt\CpsCounter;
use jorgeeqt\task\PlayerTask;
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class PlayerTag extends PluginBase {
  
  private static PlayerTag $instance;
  
  static public function getInstance(): self
  {
    return self::$instance;
  }
  
  public function onLoad(): void
  {
    $this->getScheduler()->scheduleRepeatingTask(new PlayerTask($this), 5);
  }
  
  public function onEnable(): void 
  {
    $this->getLogger()->info("PlayerTag: Enabled Sussefully");
    self::$instance = $this;
  }
  
  public function replaceCaracters(Player $player, string $caracter): string 
  {
    $caracter = str_replace("{cps}", self::getInstance()->getCpsCounter()->getCps($player), $caracter);
    $caracter = str_replace("{ping}", $player->getNetworkSession()->getPing(), $caracter);
    $caracter = str_replace("{health}", $player->getHealth(), $caracter);
    $caracter = str_replace("{device}", DeviceModel::getInstance()->getDeviceOS($player->getName(), $caracter);
    $caracter = str_replace("{control}", DeviceMode::getInstance()->getInput($player->getName(), $caracter);
  }
}
?>
