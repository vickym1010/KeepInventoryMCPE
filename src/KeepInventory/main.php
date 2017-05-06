<?php

namespace KeepInventory;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\player;
use pocketmine\server;
use pocketmine\utils\TextFormat;
use pocketmine\level\Level;
use pocketmine\block\Block;
use pocketmine\entity\Entity;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerRespawnEvent;

class Main extends PluginBase implements Listener{
  
  public $drops = array();
  
  public function onEnable(){
    $this->getServer()->getLogger()->info(TextFormat::RED."KeepInventory By: Vickym1010.");
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
  
  
  public function PlayerDeath(PlayerDeathEvent $event){
    $player = $event->getEntity();
    $this->drops[$player->getName()][1] = $player->getInventory()->getArmorContents();
    $this->drops[$player->getName()][0] = $player->getInventory()->getContents();
    $event->setDrops(array());
    $player->teleport($player-getLevel()->getSpawn());
    }
  
  public function PlayerRespawn(PlayerRespawnEvent $event){
    $player = $event->getPlayer();
    
