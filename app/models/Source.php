<?php

class Source extends Eloquent {

  public $timestamps = false;

  function currency() {
    return $this->belongsTo('Source');
  }

  function prices() {
    return $this->hasMany('Price');
  }

}