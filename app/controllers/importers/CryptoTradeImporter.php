<?php

class CryptoTradeImporter extends BaseImporter {

  public static $url = 'https://crypto-trade.com/api/1/ticker/btc_usd';
  public static $verify_ssl = false;
  public static $currency = Currency::BITCOIN;
  public static $source = Source::CRYPTOTRADE;

  function parse($response) {
    return $response->data->last;
  }

}