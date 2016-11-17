<?php
/* Made By Thunder33345 */
namespace Thunder33345\TimeMoney;

use pocketmine\Player;
use pocketmine\scheduler\PluginTask;

class giveMoneyTask extends PluginTask
{
  private $loader, $server;
  private $players;
  private $economy;
  private $time, $grant;

  public function __construct(Loader $loader)
  {
    parent::__construct($loader);
    $this->loader = $loader;
    $this->server = $loader->getServer();
    $this->economy = $loader->getEconomy();
    $this->time = $loader->getConfig()->get('time') * 60;
    $this->grant = $loader->getConfig()->get('grant');
    $this->players = &$loader->players; //hack
  }

  public function onRun($currentTick)
  {
    foreach ($this->players as $key => $player)
      if (!$this->server->getPlayerExact($key) instanceof Player) unset($this->players[$key]);

    foreach ($this->server->getOnlinePlayers() as $player) {
      if (isset($this->players[$player->getName()]) == false) {
        $this->players[$player->getName()] = time() + $this->time;
      } else
        if (time() > $this->players[$player->getName()]) {
          $this->economy->give($player->getName(), $this->grant);
          $this->players[$player->getName()] = time() + $this->time;
        }
    }
  }
}