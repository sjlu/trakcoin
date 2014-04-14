<?php

class BitKonanImporter extends BaseImporter {

  public static $url = 'https://bitkonan.com/api/ticker';
  public static $currency = Currency::BITCOIN;
  public static $source = Source::BITKONAN;

  function run() {
    parent::run();
  }

  function parse($response) {
    return $response->last;
  }

}