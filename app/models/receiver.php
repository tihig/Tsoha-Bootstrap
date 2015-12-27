<?php

class receiver extends BaseModel{
   
   public  $id, $name, $address, $phone, $e_mail;

   public function __construct($attributes){
    parent::__construct($attributes);
   }
    public static function all(){
    $query = DB::connection()->prepare('SELECT * FROM Receiver');
    $query->execute();
    $rows = $query->fetchAll();
    $receivers = array();


    foreach($rows as $row){
        $receivers[] = new receiver(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'address' => $row['address'],
        'phone' => $row['phone'],
        'e_mail' => $row['e_mail']
      ));
    }

    return $receivers;
  }

}