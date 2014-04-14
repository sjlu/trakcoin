<?php

class DataController extends BaseController {

  function getSources() {
    $sources = Source::all();
    return Response::JSON($sources);
  }

}