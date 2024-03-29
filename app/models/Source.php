<?php

class Source extends Eloquent {

  const COINBASE = 'Coinbase';
  const BITSTAMP = 'Bitstamp';
  const BTCE = 'BTC-E';
  const CRYPTOTRADE = 'Crypto-Trade';
  const BITKONAN = 'BitKonan';

  protected $fillable = array(
    'name'
  );

  protected $hidden = array(
    'created_at',
    'currency_id'
  );

  function currency() {
    return $this->belongsTo('Currency');
  }

  function prices() {
    return $this->hasMany('Price');
  }

}