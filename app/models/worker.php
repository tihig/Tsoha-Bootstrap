<?php

class worker extends BaseModel{
   
   public  $id, $name, $password;

   public function __construct($attributes){
    parent::__construct($attributes);
    $this->validators = array('validate_int');
   }
   
     public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Worker WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $user = new worker(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'password' => $row['password']
      ));

      return $user;
    }

    return null;
  
  }
   
   public static function authenticate($name, $password){
     $query = DB::connection()->prepare('SELECT * FROM Worker WHERE name = :name AND password = :password LIMIT 1');
     $query->execute(array('name' => $name, 'password' => $password));
     $row = $query->fetch();
     
     if($row){
        $user = new worker(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'password' => $row['password']
      ));
        Kint::dump($user);
        return $user;
        
     } else{
      return null;
      }
   }
}

