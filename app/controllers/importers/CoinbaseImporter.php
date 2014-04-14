<?php

class CoinbaseImporter extends BaseImporter {

  public static $url = 'https://coinbase.com/api/v1/prices/spot_rate';
  public static $currency = Currency::BITCOIN;
  public static $source = Source::COINBASE;

  function parse($response) {
    return $response->amount;
  }

}