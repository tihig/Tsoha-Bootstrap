<?php

class UserController extends BaseController{
   
  public static function login(){
     //jostaan syystä redirectaa itseensä?? O__O
      View::make('user/login.html');
  }
  public static function handle_login(){
    $params = $_POST;

    $user = worker::authenticate($params['name'], $params['password']);
    
    if(!$user){
      View::make('/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'name' => $params['name']));
    }else{
      $_SESSION['user'] = $user->id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $user->name . '!'));
    }
  }
   public static function logout(){
      Kint::trace();
    $_SESSION['user'] = null;
    Redirect::to('/login.html', array('message' => 'Olet kirjautunut ulos!'));
  }
}

