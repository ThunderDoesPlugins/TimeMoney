<?php
/** Created By Thunder33345 **/
namespace Thunder33345\TimeMoney;
use pocketmine\event\Listener;

class EventListener implements Listener{
	private $server, $loader;

	public function __construct(Loader $loader)
	{
		$this->loader = $loader;
		$this->server = $loader->getServer();
		$loader->getServer()->getPluginManager()->registerEvents($this,$loader);
	}

}