<?php

class WaybillController extends BaseController{
   public static function index(){
    $waybills = waybill::all();
    View::make('waybill/index.html', array('waybills' => $waybills));
  }
   public static function show($id){
    $waybill = waybill::show($id);
    View::make('waybill/show.html', array('waybill' => $waybill));
  }
   public static function find($id){
    $waybill = waybill::find($id);
    View::make('waybill/index.html', array('waybill' => $waybill));
  }
  
  public static function search(){
    View::make('waybill/search.html');
  }
  //Ei toimi :(((
  public static function create(){
    $customers = customer::all();
    View::make('waybill/new.html', array('customer' => $customers));
  }
  public static function edit($id){
     $waybill = waybill::find($id);
     Kint::dump($waybill);
     //View::make('waybill/edit.html', array('attributes'=> $waybill));
  }
  
  public static function update($id){
     $params = $_POST;
     
      Kint::dump($params);
     
     /*$attributes = array(
         'id' =>$id,
         'customer_id' => $customer_id,
         'receiver_id' => $receiver_id,
         'arrived' => $arrived
     );
     
    
     
     $waybill = new waybill($attributes);
     $errors = $waybill->errors();*/
     
    /* if(count($errors)>0){
        View::make('waybill/edit.html', array('errors' => $errors, 'attributes' => $attributes));
     }  else {
        $waybill->update();
        Redirect::to('/waybill/', $waybill->id, array('message' => 'Rahtikirjan muokkaus onnistui.'));
     }*/
  }

  public static function destroy($id){
   $waybill = new waybill(array('id'=> $id));
   
   Kint::dump($waybill);
   //$waybill->destroy();
   
   //Redirect::to('/waybill', array('message'=> 'Rahtikirjan poisto onnistui.'));
  }
  
  public static function store(){
    $params = $_POST;
 
    $waybill = new waybill(array(
        'customer_id' => $params['customer_id'],
        'receiver_id' => $params['receiver_id'],
        'arrived' => $params['arrived']
    ));

    //Kint::dump($params);
    $waybill->save();

    Redirect::to('/waybill/' . $waybill->id .'/show', array('message' => 'Uusi tilaus on tallennettu!'));
  }
  
    /*public static function receivers(){
    View::make('/waybill/new.html', array());
  }*/
  
   public static function customers(){
    $customers = customer::all();
    $receivers = receiver::all();
    View::make('/waybill/new.html', array('customers' => $customers, 'receivers' => $receivers));
  }
  
 public static function newUnit($id){
    $waybill = waybill::find($id);
    View::make('/waybill/' . $waybill->id .'/new.html', array('waybill' => $waybill));
  }
  
    public static function listUnits(){
    $units = unit::all();
    View::make('/waybill/new.html', array('units' => $units));
  }
  
}

