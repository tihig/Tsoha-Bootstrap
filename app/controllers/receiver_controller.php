<?php

class ReceiverController extends BaseController{
  public static function index(){
    $receivers = receiver::all();
    View::make('receiver/index.html', array('receivers' => $receivers));
  }
  
   public static function receivers(){
    $receivers = receiver::all();
    View::make('waybill/new.html', array('receivers' => $receivers));
  }

}