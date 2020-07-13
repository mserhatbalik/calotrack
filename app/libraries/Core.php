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
    // Getting the array
    $url = $this->getURL();

    // Checking if the first index of the array is available as file, which is a specific controller class
    if (isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {

      // Setting our currentController to the URL's specified controller.
      $this->currentController = ucwords($url[0]);

      // Unsetting this to 0 to prevent complications while setting parameters.
      unset($url[0]);
    }

    // This will run no matter what the URL is. If the file is there it will load it, if it is not, it will require the default controller file (Home)
    require_once '../app/controllers/' . $this->currentController . '.php';

    // We will also instantiate this controller class, so we can use it's methods and properties.
    $this->currentController = new $this->currentController();


    // Check for second part of the URL (method)
    if (isset($url[1])) {

      // If the second part exists, then we check if that value exists as a method inside our current controller.
      if (method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];

        // We unset the URL as usual, so it won't mess up our parameter assignment later on.
        unset($url[1]);
      }
    }

    // We get parameters as you can see we get everything inside the $url, this is why we unset the index 0 and 1.
    $this->parameters = $url ? array_values($url) : [];

    // Sending our parameters to current controller's current method.
    call_user_func_array([$this->currentController, $this->currentMethod], $this->parameters);
  }

  // Getting the URL and passing it into an array for further processing.
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
