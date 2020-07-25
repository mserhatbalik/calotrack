<?php

class Home extends Controller
{

  public function __construct()
  {
    // echo "Home(default) controller loaded";
  }

  public function index()
  {
    $data = ['title' => 'Home Page'];

    $this->view('home/index', $data);
  }

  public function about()
  {
    $data = ['title' => 'About Us'];
    $this->view('home/about', $data);
  }
}
