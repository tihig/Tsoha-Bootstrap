<?php

class ReceiverController extends BaseController{
  public static function index(){
    $receivers = receiver::all();
    View::make('receiver/index.html', array('receivers' => $receivers));
  }
  
    public static function create(){
    View::make('receiver/new.html');
  }
  
    public static function store(){
    $params = $_POST;
    
    $attributes = array(
        'name' => $params['name'],
        'address' => $params['address'],
        'postcode' => $params['postcode'],
        'city' => $params['city'],
        'phone' => $params['phone'],
        'e_mail' => $params['e_mail']
    );
    
   $receiver = new receiver($attributes);
   $errors = $receiver->errors();
   
  if(count($errors) == 0){
    $receiver->save();

    Redirect::to('/waybill/new', array('message' => 'Vastaanottaja on lisätty onnistuneesti!'));
  }else{

    View::make('receiver/new.html', array('errors' => $errors, 'attributes' => $attributes));
  }
  }

}