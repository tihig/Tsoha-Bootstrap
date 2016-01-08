<?php


class customer extends BaseModel{
   
   public  $id, $name, $phone, $e_mail;

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
        'phone' => $row['phone'],
        'e_mail' => $row['e_mail']
      ));
    }

    return $customers;
  }
    public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Customer WHERE id = :id LIMIT 1;');
    $query->execute(array('id' => $id));
    $row = $query->fetch();


    if($row){
      $customers[] = new customer(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'phone' => $row['phone'],
        'e_mail' => $row['e_mail']
      ));
      return $customer;
    }
   return null;
    
  }
     public function save(){
    $query = DB::connection()->prepare('INSERT INTO Customer (name, phone, e_mail) VALUES ( :name, :address, :phone, :e_mail) RETURNING id');
    $query->execute(array('name' => $this->name, 'phone' => $this->phone, 'e_mail' => $this->e_mail));
    $row = $query->fetch();
    
    //Kint::trace();
    //Kint::dump($row);
    
   $this->id = $row['id'];
  }
    public function delete($id){
    $query = DB::connection()->prepare('DELETE FROM Customer WHERE id= :id RETURNING id');
    $query->execute(array('id'=> $id));
    $row = $query->fetch();
    
  
    Kint::dump($row);
   //$this->id = $row['id'];
  }
  }

