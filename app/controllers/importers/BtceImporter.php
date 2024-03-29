<?php

class BtceImporter extends BaseImporter {

  public static $url = 'https://btc-e.com/api/2/btc_usd/ticker';
  public static $currency = Currency::BITCOIN;
  public static $source = Source::BTCE;

  function parse($response) {
    return $response->ticker->last;
  }

}