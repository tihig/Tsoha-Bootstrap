<?php

class CustomerController extends BaseController{
  public static function index(){
    $customers = customer::all();
    View::make('customer/index.html', array('customers' => $customers));
  }
    public static function create(){
    View::make('customer/new.html');
  }
    public static function store(){
    $params = $_POST;
    Kint::dump($params);
    /*$attributes = array(
        'name' => $params['name'],
        'phone' => $params['phone'],
        'e_mail' => $params['e_mail']
    );
    
   $customer = new customer($attributes);
   //$errors = $customer->errors();
   
  // if(count($errors) == 0){
    $customer->save();

    Redirect::to('/customer', array('message' => 'Asiakas on lisätty onnistuneesti!'));
  /*}else{
    $customers = customer::all();
    $receivers = receiver::all();
    View::make('waybill/new.html', array('errors' => $errors, 'attributes' => $attributes, 'customers' => $customers, 'receivers' => $receivers));
  }*/
    //
  }
    public static function destroy($id){
   $customer = new customer(array('id'=> $id));
   Kint::dump($customer);
   
   /*$customer->delete($id);
   
   Redirect::to('/customer', array('message'=> 'Lähettäjän poisto onnistui.'));*/
  }
  
}
