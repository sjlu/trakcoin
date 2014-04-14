<?php

class Source extends Eloquent {

  const COINBASE = 'Coinbase';
  const BITSTAMP = 'Bitstamp';
  const BTCE = 'BTC-E';

  protected $fillable = array(
    'name'
  );

  function currency() {
    return $this->belongsTo('Source');
  }

  function prices() {
    return $this->hasMany('Price');
  }

}