<?php
/** Created By Thunder33345 **/
namespace Thunder33345\TimeMoney\Economy;
interface EconomyInterface
{
  public function give($user, $money);

  public function take($user, $money);

  public function getMoney($user);
}