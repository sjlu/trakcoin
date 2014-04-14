<?php

class BaseImporter extends Controller {

  function run() {
    if (!isset(static::$url)) {
      throw new Exception("URL is not set.");
    }

    if (!isset(static::$currency)) {
      throw new Exception("Currency type is not set.");
    }

    if (!isset(static::$source)) {
      throw new Exception("Source type is not set.");
    }

    $content = $this->requestJsonFromUrl(static::$url);
    $amount = $this->parse($content);
    $this->saveToDatabase(static::$currency, static::$source, $amount);
  }

  protected function requestUrl($url) {
    $curl = Curl::newRequest('get', $url);
    if (isset(static::$verify_ssl)) {
      $curl->setOptions(array(
        CURLOPT_SSL_VERIFYPEER => static::$verify_ssl
      ));
    }

    return $curl->send()->body;
  }

  protected function requestJsonFromUrl($url) {
    return json_decode($this->requestUrl($url));
  }

  protected function saveToDatabase($currency, $source, $price) {
    // set the latest price to the source
    $source = Source::firstOrCreate(array('name' => $source));
    $source->latest_price = $price;
    $source->save();

    // check if the source was new or not.
    if (!$source->currency()) {
      $currency = Currency::firstOrCreate(array('name' => $currency));
      $currency->sources()->save($source);
      $currency->save();
    }

    // create historical price data
    $price = Price::create(array('amount' => $price));
    $price->source()->associate($source);
    $price->save();
  }

}