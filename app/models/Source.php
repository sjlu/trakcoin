<?php

class Source extends Eloquent {

  const COINBASE = 'coinbase';
  const BITSTAMP = 'bitstamp';

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