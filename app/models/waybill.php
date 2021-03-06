<?php

class waybill extends BaseModel{
   
   public  $id, $customer_id, $receiver_id, $ordered, $arrived;

   public function __construct($attributes){
    parent::__construct($attributes);
    $this->validators = array('validate_waybill');
   }

   public static function all(){
    $query = DB::connection()->prepare('SELECT * FROM Waybill;');
    $query->execute();
    $rows = $query->fetchAll();
    $waybills = array();

    foreach($rows as $row){
      $waybills[] = new waybill(array(
        'id' => $row['id'],
        'customer_id' => $row['customer_id'],
        'receiver_id' => $row['receiver_id'],
        'arrived' => $row['arrived']
      ));
    }


    return $waybills;
  
  }
  
  
  public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Waybill WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $waybill = new waybill(array(
        'id' => $row['id'],
        'customer_id' => $row['customer_id'],
        'receiver_id' => $row['receiver_id'],
        'ordered' => $row['ordered'],
        'arrived' => $row['arrived']
      ));

      return $waybill;
    }

    return null;
  
  }
//. $id .
  public static function show($id){
    $query = DB::connection()->prepare('SELECT * FROM Waybill WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();
    
       if($row){
      $waybill = new waybill(array(
        'id' => $row['id'],
        'customer_id' => $row['customer_id'],
        'receiver_id' => $row['receiver_id'],
        'ordered' => $row['ordered'],
        'arrived' => $row['arrived']
      ));
      return $waybill;
    }

    return null;
  }
   public function save(){
    $query = DB::connection()->prepare('INSERT INTO Waybill (customer_id, receiver_id, arrived) VALUES ( :customer_id, :receiver_id, :arrived) RETURNING id');
    $query->execute(array('customer_id' => $this->customer_id, 'receiver_id' => $this->receiver_id, 'arrived' => $this->arrived));
    $row = $query->fetch();
    
    //Kint::trace();
    //Kint::dump($row);
    
   $this->id = $row['id'];
  }
  
  public function update(){
       // JUPDATE:ssa joku vika??
    $query = DB::connection()->prepare('INSERT INTO Waybill (customer_id, receiver_id, arrived) VALUES ( :customer_id, :receiver_id, :arrived) RETURNING id');
    $query->execute(array('customer_id' => $this->customer_id, 'receiver_id' => $this->receiver_id, 'arrived' => $this->arrived, 'id'=> $this->id));
    $row = $query->fetch();
    
    Kint::trace();
    Kint::dump($row);
    $this->id = $row['id'];
  }
  
    public function delete($id){
    $query = DB::connection()->prepare('DELETE FROM Waybill WHERE id= :id RETURNING id');
    $query->execute(array('id'=> $id));
    $row = $query->fetch();
    
  
    //Kint::dump($row);
   $this->id = $row['id'];
  }
  }

