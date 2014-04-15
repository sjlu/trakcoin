<?php

class Currency extends Eloquent {

  const BITCOIN = 'Bitcoin';

  public $timestamps = false;
  protected $fillable = array(
    'name'
  );

  function sources() {
    return $this->hasMany('Source');
  }

}