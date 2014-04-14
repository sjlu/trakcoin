<?php

class Price extends Eloquent {

  protected $fillable = array(
    'amount'
  );

  function source() {
    return $this->belongsTo('Source');
  }

}