<?php
  /**
   *
   */
  class Pages extends Controller {
    function __construct(){

    }
    public function index(){
      $data = [
        'title' => 'MyMVC'
      ];
      $this->view('pages/index', $data);
    }
    public function about(){
      $data = [
        'title' => 'About Us'
      ];
      $this->view('pages/about', $data);
    }
  }
