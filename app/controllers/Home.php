<?php

class Home
{

  public function __construct()
  {
    // echo "Home(default) controller loaded";
  }

  public function index()
  {
  }

  public function about($id)
  {
    echo "about is loaded. id is ->" . $id;
  }
}
