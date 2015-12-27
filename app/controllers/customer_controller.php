<?php

class CustomerController extends BaseController{
  public static function index(){
    $customers = customer::all();
    View::make('customer/index.html', array('customers' => $customers));
  }
}
