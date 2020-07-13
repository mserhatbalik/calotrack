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
    $url = $this->getURL();

    if (isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {

      $this->currentController = ucwords($url[0]);

      unset($url[0]);
    }

    require_once '../app/controllers/' . $this->currentController . '.php';

    $this->currentController = new $this->currentController();
  }

  public function getURL()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
