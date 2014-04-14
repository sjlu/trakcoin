<?php

class CoinbaseImporter extends BaseImporter {

  public static $url = 'https://coinbase.com/api/v1/prices/spot_rate';
  public static $currency = Currency::BITCOIN;
  public static $source = Source::COINBASE;

  function run() {
    $amount = $this->getAmount();
    $this->saveToDatabase(self::$currency, self::$source, $amount);
  }

  function getAmount() {
    $data = $this->requestJsonFromUrl(self::$url);
    $amount = $data->amount;
    return $amount;
  }

}