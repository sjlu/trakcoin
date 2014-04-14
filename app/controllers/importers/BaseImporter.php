<?php

class BaseImporter extends Controller {

  function requestUrl($url) {
    return Curl::get($url)->body;
  }

  function requestJsonFromUrl($url) {
    return json_decode($this->requestUrl($url));
  }

  function saveToDatabase($currency, $source, $price) {
    $source = Source::firstOrCreate(array('name' => $source));
    // check if the source was new or not.
    if (!$source->currency()) {
      $currency = Currency::firstOrCreate(array('name' => $currency));
      $currency->sources()->save($source);
    }
    // create the price and associate it
    $price = Price::create(array('amount' => $price));
    $price->source()->associate($source);
  }

}