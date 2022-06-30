<?php

namespace jorgeeqt\task;

use jorgeeqt\PlayerTag;
use jorgeeqt\libs\jorgeeqt\CpsCounter;
use jorgeeqt\libs\device\DeviceModel;

class PlayerTask extends Task {
  
  private $plugin;
  
  public function __construct(PlayerTag $plugin)
  {
    $this->plugin = $plugin;
  }
  
  public function onRun(): void
  {
    self::createTag();
  }
  
  static public function createTag(){
    foreach(Server::getInstance()->getOnlinePlayers as $player)
    {
      $cps = (int)PlayerTag::getInstance()->getCpsCounter()->getCps($player);
      $device = PlayerTag::getInstance()->getDeviceModel();
      $ping = $player->getNetworkSession()->getPing();
      
      $tag = TextFormat::EOL . TextFormat::GREEN . PlayerTag::getInstance()->getDeviceModel()->getDeviceOS($player->getName()) . TextFormat::GRAY . " | " . TextFormat::GREEN . PlayerTag::getInstance()->getDeviceMode()->getInput($player->getName()) . TextFormat::EOL.
        TextFormat::BOLD.TextFormat::GRAY. "( " .TextFormat::RESET . TextFormat::GREEN . "CPS: " . TextFormat::WHITE . $cps . TextFormat::GRAY . " - " . TextFormat::WHITE . $ping . TextFormat::GREEN . "ms";
      
      $player->setScoreTag($tag);
    }
  }
}
?>
