<?php

class WaybillController extends BaseController{
   
   public static function index(){
    $waybills = waybill::all();
    $customers = customer::all();
    $receivers = receiver::all();
    View::make('waybill/index.html', array('waybills' => $waybills, 'customers' => $customers, 'receivers' => $receivers));
  }
    public static function edit($id){
     $waybill = waybill::find($id);
     $customers = customer::all();
     $receivers = receiver::all();
     View::make('waybill/edit.html', array('waybill'=> $waybill, 'customers' => $customers, 'receivers' => $receivers));
  }
   public static function show($id){
    $waybill = waybill::show($id);
    $customers = customer::all();
    $receivers = receiver::all();
    $units = unit::all();
    View::make('waybill/show.html', array('waybill' => $waybill, 'customers' => $customers, 'receivers' => $receivers, 'units' => $units));
  }
   public static function find($id){
    $waybill = waybill::find($id);
    View::make('waybill/index.html', array('waybill' => $waybill));
  }
  
  public static function search(){
    View::make('waybill/search.html');
  }
  
  public static function create(){
    $customers = customer::all();
    View::make('waybill/new.html', array('customer' => $customers));
  }

  
  public static function update($id){
     $params = $_POST;
     
     $attributes = array(
         'id' =>$params['id'],
         'customer_id' => $params['customer_id'],
         'receiver_id' => $params['receiver_id'],
         'arrived' => $params['arrived']
     );
     
     $waybill = new waybill($attributes);
     $errors = $waybill->errors();
     
    if(count($errors)>0){
        $customers = customer::all();
        $receivers = receiver::all();
        View::make('waybill/edit.html', array('errors' => $errors, 'waybill' => $waybill, 'customers' => $customers, 'receivers' => $receivers));
     }  else {
        $waybill->update();
        Redirect::to('/waybill/', $waybill->id, array('message' => 'Rahtikirjan muokkaus onnistui.'));
     }
  }

  public static function destroy($id){
   $waybill = new waybill(array('id'=> $id));
   
   $waybill->delete($id);
   
   Redirect::to('/waybill', array('message'=> 'Rahtikirjan poisto onnistui.'));
  }
  
  public static function store(){
    $params = $_POST;
 
    $attributes = array(
        'customer_id' => $params['customer_id'],
        'receiver_id' => $params['receiver_id'],
        'arrived' => $params['arrived']
    );
    
   $waybill = new waybill($attributes);
   $errors = $waybill->errors();
   
   if(count($errors) == 0){
    $waybill->save();

    Redirect::to('/waybill/' . $waybill->id .'/show', array('message' => 'Rahtikirja on lisätty onnistuneesti!'));
  }else{
    $customers = customer::all();
    $receivers = receiver::all();
    View::make('waybill/new.html', array('errors' => $errors, 'attributes' => $attributes, 'customers' => $customers, 'receivers' => $receivers));
  }
    //Kint::dump($params);
  }
  
   public static function customers(){
    $customers = customer::all();
    $receivers = receiver::all();
    View::make('/waybill/new.html', array('customers' => $customers, 'receivers' => $receivers));
  }
  //$waybill_id, $productname, $weight, $velocity,$demand, $un_number, $loading_format, $info;
  public static function storeUnit(){
      $params = $_POST;
      //Kint::dump($params);
 
    $attributes = array(
        'waybill_id' => $params['waybill_id'],
        'productname' => $params['productname'],
        'weight' => $params['weight'],
        'velocity' => $params['velocity'],
        'demand' => $params['demand'],
        'un_number' => $params['un_number'],
        'loading_format' => $params['loading_format'],
        'info' => $params['info']
    );
    
   $unit = new unit($attributes);
   //$errors = $unit->errors();
   
  //if(count($errors) == 0){
    $unit->save();

    Redirect::to('/waybill/' . $unit->waybill_id .'/show', array('message' => 'Uusi tuote on lisätty onnistuneesti!'));
  /*}else{
   
    $waybill = $this->find($unit->waybill_id);
    View::make('waybill/' .$unit->waybill_id. 'unit.html', array('errors' => $errors, 'attributes' => $attributes, 'waybill' => $waybill));
  }
    //Kint::dump($params);*/
  }
  
 public static function createUnit($id){
    $waybill = waybill::find($id);
    View::make('waybill/unit.html', array('waybill' => $waybill));
  }
  
   public static function destroyUnit($id){
   $unit = new unit(array('id'=> $id));
   $unit->delete($id);
   
   Redirect::to('/waybill', array('message'=> 'Tuotteen poisto onnistui.'));
  }
  
    public static function listUnits(){
    $units = unit::all();
    View::make('/waybill/new.html', array('units' => $units));
  }
  
}

