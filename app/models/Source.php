<?php

class Source extends Eloquent {

  const COINBASE = 'coinbase';

  public $timestamps = false;
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