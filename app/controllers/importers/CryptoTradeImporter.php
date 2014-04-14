<?php

class CryptoTradeImporter extends BaseImporter {

  public static $url = 'https://crypto-trade.com/api/1/ticker/btc_usd';
  public static $currency = Currency::BITCOIN;
  public static $source = Source::CRYPTOTRADE;

  function run() {
    $amount = $this->getAmount();
    $this->saveToDatabase(self::$currency, self::$source, $amount);
  }

  function getAmount() {
    $data = $this->requestJsonFromUrl(self::$url);
    $amount = $data->data->last;
    return $amount;
  }

}