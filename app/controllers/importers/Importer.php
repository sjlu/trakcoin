<?php
/**
 * This class should theoretically work to create
 * a multi-threaded application. Unfortuantely the server
 * requries a pretty complicated install of PHP.
 */
class Importer extends Thread {

  private $class = null;

  function __construct() {
    parent::__construct();
    if (func_num_args() != 1) {
      throw new Exception("Thread requires a importer class.");
    }
    $args = func_get_args();
    $this->class = $args[0];
  }

  function run() {
    $class = new $this->class;
    $class->run();
  }

}