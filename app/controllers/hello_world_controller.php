<?php
//require 'app/models/unit.php';
  class HelloWorldController extends BaseController{
   
   public static function info(){
      // infosivu
      View::make('info.html');
    }

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('home.html');
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      
     View::make('home.html');
    }

  }
