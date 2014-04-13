<?php

class Currency extends Eloquent {

  public $timestamps = false;

  function sources() {
    return $this->hasMany('Source');
  }

}