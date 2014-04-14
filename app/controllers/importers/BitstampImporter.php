<?php

class BitstampImporter extends BaseImporter {

  public static $url = 'https://www.bitstamp.net/api/ticker/';
  public static $currency = Currency::BITCOIN;
  public static $source = Source::BITSTAMP;

  function parse($response) {
    return $response->last;
  }

}