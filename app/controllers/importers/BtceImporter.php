<?php

class BtceImporter extends BaseImporter {

  public static $url = 'https://btc-e.com/api/2/btc_usd/ticker';
  public static $currency = Currency::BITCOIN;
  public static $source = Source::BTCE;

  function run() {
    $amount = $this->getAmount();
    $this->saveToDatabase(self::$currency, self::$source, $amount);
  }

  function getAmount() {
    $data = $this->requestJsonFromUrl(self::$url);
    $amount = $data->ticker->last;
    return $amount;
  }

}