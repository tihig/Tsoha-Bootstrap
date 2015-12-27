<?php

class WaybillController extends BaseController{
   public static function index(){
    $waybills = waybill::all();
    View::make('waybill/index.html', array('waybills' => $waybills));
  }
   public static function show($id){
    $waybill = waybill::show($id);
    View::make('waybill/index.html', array('waybill' => $waybill));
  }
   public static function find($id){
    $waybill = waybill::find($id);
    View::make('waybill/index.html', array('waybill' => $waybill));
  }
  
  public static function search(){
    View::make('waybill/search.html');
  }
  //Ei toimi :(((
 public static function listCustomers(){
    $customers = customer::all();
    View::make('waybill/new.html', array('customer_list' => $customers));
  }
  public static function create(){
    View::make('waybill/new.html');
  }
  public static function store(){
    $params = $_POST;
 
    $waybill = new waybill(array(
        'unit_id' => $params['unit_id'],
        'customer_id' => $params['customer_id'],
        'receiver_id' => $params['receiver_id'],
        'amount' => $params['amount'],
        'arrived' => $params['arrived']
    ));

    Kint::dump($params);
    $waybill->save();

    Redirect::to('/waybill/' . $waybill->id, array('message' => 'Uusi tilaus on tallennettu!'));
  }
}

