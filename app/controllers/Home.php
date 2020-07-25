<?php

class Home extends Controller
{

  public function __construct()
  {
    // echo "Home(default) controller loaded";
  }

  public function index()
  {
    $data = ['title' => 'Universe'];

    $this->view('home/index', $data);
  }

  public function about()
  {
    $this->view('home/about');
  }
}
