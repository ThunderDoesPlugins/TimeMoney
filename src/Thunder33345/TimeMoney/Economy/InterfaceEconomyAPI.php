<?php
/** Created By Thunder33345 **/
namespace Thunder33345\TimeMoney\Economy;

use onebone\economyapi\EconomyAPI;

class InterfaceEconomyAPI implements EconomyInterface
{
  private $api;

  public function __construct(EconomyAPI $api)
  {
    $this->api = $api;
  }

  public function give($user, $money)
  {
    return $this->api->addMoney($user, $money);
  }

  public function take($user, $money)
  {
    return $this->api->reduceMoney($user, $money);
  }

  public function getMoney($user)
  {
    return $this->api->myMoney($user);
  }
}