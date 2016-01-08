<?php

class ReceiverController extends BaseController{
  public static function index(){
    $receivers = receiver::all();
    View::make('receiver/index.html', array('receivers' => $receivers));
  }
  
    public static function create(){
    View::make('receiver/new.html');
  }
  
   public static function destroy($id){
   $receiver = new receiver(array('id'=> $id));

   
   $receiver->delete($id);
   
   Redirect::to('/receiver', array('message'=> 'Vastaanottajan poisto onnistui.'));
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

}