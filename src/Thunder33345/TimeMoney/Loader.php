<?php
/** Created By Thunder33345 **/
namespace Thunder33345\TimeMoney;

use onebone\economyapi\EconomyAPI;
use pocketmine\plugin\PluginBase;
use Thunder33345\TimeMoney\Economy\EconomyInterface;
use Thunder33345\TimeMoney\Economy\InterfaceEconomyAPI;

class Loader extends PluginBase
{
  /** @var  $economy EconomyInterface */
  private $economy, $task;

  public function onLoad()
  {

  }

  public function onEnable()
  {
    try {
      $api = EconomyAPI::getInstance();
    } catch (\Exception$exception) {
      $this->getServer()->getLogger()->alert('[TimeMoney] Failed to load economyAPI, Shutting down...');
      $this->getPluginLoader()->disablePlugin($this);
    }
    $this->economy = new InterfaceEconomyAPI($api);
    $this->task = new giveMoneyTask($this);
    $this->getServer()->getScheduler()->scheduleDelayedRepeatingTask($this->task, 200, 1200);
  }

  public function onDisable()
  {

  }

  public function getEconomy()
  {
    if ($this->economy instanceof EconomyInterface) {
      return $this->economy;
    } else return null;
  }

  private function config()
  {
    $config = [
      "time" => "5", // in min
      "grant" => "10", // how much
      //"economy" => "EconomyAPI" //maybe will add
    ];
  }
}