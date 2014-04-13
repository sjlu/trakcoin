<?php

class Price extends Eloquent {

  function source() {
    $this->belongsTo('Source');
  }

}