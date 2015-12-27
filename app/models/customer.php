<?php


class customer extends BaseModel{
   
   public  $id, $name, $address, $phone, $e_mail;

   public function __construct($attributes){
    parent::__construct($attributes);
   }
    public static function all(){
    $query = DB::connection()->prepare('SELECT * FROM Customer');
    $query->execute();
    $rows = $query->fetchAll();
    $customers = array();


    foreach($rows as $row){
      $customers[] = new customer(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'address' => $row['address'],
        'phone' => $row['phone'],
        'e_mail' => $row['e_mail']
      ));
    }

    return $customers;
  }
  }

