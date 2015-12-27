<?php

class waybill extends BaseModel{
   
   public  $id, $unit_id, $customer_id, $receiver_id,$amount, $ordered, $arrived;

   public function __construct($attributes){
    parent::__construct($attributes);
   }
    public static function all(){
    $query = DB::connection()->prepare('SELECT * FROM Waybill');
    $query->execute();
    $rows = $query->fetchAll();
    $waybills = array();


    foreach($rows as $row){
      $waybills[] = new waybill(array(
        'id' => $row['id'],
        'unit_id' => $row['unit_id'],
        'customer_id' => $row['customer_id'],
        'receiver_id' => $row['receiver_id'],
        'amount' => $row['amount'],
        'ordered' => $row['ordered'],
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
        'unit_id' => $row['unit_id'],
        'customer_id' => $row['customer_id'],
        'receiver_id' => $row['receiver_id'],
        'amount' => $row['amount'],
        'ordered' => $row['ordered'],
        'arrived' => $row['arrived']
      ));

      return $waybill;
    }

    return null;
  
  }

  public static function show($id){
    $query = DB::connection()->prepare('SELECT * FROM Waybill WHERE id = '. $id . 'LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();
    
       if($row){
      $waybill = new waybill(array(
        'id' => $row['id'],
        'unit_id' => $row['unit_id'],
        'customer_id' => $row['customer_id'],
        'receiver_id' => $row['receiver_id'],
        'amount' => $row['amount'],
        'ordered' => $row['ordered'],
        'arrived' => $row['arrived']
      ));
      return $waybill;
    }

    return null;
  }
   public function save(){
    $query = DB::connection()->prepare('INSERT INTO Waybill (unit_id, customer_id, receiver_id, amount, arrived) VALUES ( :unit_id, :customer_id, :receiver_id, :amount, :arrived) RETURNING id');
    $query->execute(array('unit_id' => $this->unit_id, 'customer_id' => $this->customer_id, 'receiver_id' => $this->receiver_id, 'amount' => $this->amount, 'arrived' => $this->arrived));
    $row = $query->fetch();
    
    Kint::trace();
    Kint::dump($row);
//$this->id = $row['id'];
  }
  }

