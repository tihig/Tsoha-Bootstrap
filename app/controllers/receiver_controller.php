<?php

class ReceiverController extends BaseController{
  public static function index(){
    $receivers = receiver::all();
    View::make('receiver/index.html', array('receivers' => $receivers));
  }

}