<?php

/*  
* App Core Class
* Creates URL & Loads Core Controller
* URL FORMAT -> controller/method/parameter
*/

class Core
{

  protected $currentController = 'Home';
  protected $currentMethod = 'index';
  protected $parameters = [];

  public function __construct()
  {
    $this->getURL();
  }

  public function getURL()
  {
    echo $_GET['url'];
  }
}
