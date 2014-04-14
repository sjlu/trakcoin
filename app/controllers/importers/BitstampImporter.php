<?php

class BitstampImporter extends BaseImporter {

  public static $url = 'https://www.bitstamp.net/api/ticker/';
  public static $currency = Currency::BITCOIN;
  public static $source = Source::BITSTAMP;

  function run() {
    $amount = $this->getAmount();
    $this->saveToDatabase(self::$currency, self::$source, $amount);
  }

  function getAmount() {
    $data = $this->requestJsonFromUrl(self::$url);
    $amount = $data->last;
    return $amount;
  }

}