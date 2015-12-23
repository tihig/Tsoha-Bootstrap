<?php

  class HelloWorldController extends BaseController{
   
   public static function info(){
      // infosivu
      View::make('info.html');
    }
     
   public static function car_change(){
      // auton vaihto
      View::make('car_change.html');
    }
     
   public static function car_view(){
      // autonäkymä
      View::make('car_view.html');
    }
     
   public static function transport(){
      // kuljetusnäkymä
      View::make('transport.html');
    }
     
   public static function waybill_add(){
      // rahtikirjaan tuotteiden lisäys
      View::make('waybill_add.html');
    }
     
   public static function waybill_modify(){
      // rahtikirjan muokkaus
      View::make('waybill_modify.html');
    }
     
   public static function waybill_show(){
      // rahtikirjanäkymä
      View::make('waybill_show.html');
    }
      
   public static function waybill_list(){
      // rahtikirjojen listaus
      View::make('waybill_list.html');
    }

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('home.html');
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make('helloworld.html');
    }
  }
