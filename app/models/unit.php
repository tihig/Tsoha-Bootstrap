<?php

class unit extends BaseModel{
   
   public  $id, $waybill_id, $productname, $weight, $velocity,$demand, $un_number, $loading_format, $info;

   public function __construct($attributes){
    parent::__construct($attributes);
    $this->validators = array('validate_unit');
   }
    public static function all(){
    $query = DB::connection()->prepare('SELECT * FROM Unit');
    $query->execute();
    $rows = $query->fetchAll();
    $units = array();


    foreach($rows as $row){
      $units[] = new unit(array(
        'id' => $row['id'],
        'waybill_id' => $row['waybill_id'],
        'productname' => $row['productname'],
        'weight' => $row['weight'],
        'velocity' => $row['velocity'],
        'demand' => $row['demand'],
        'un_number' => $row['un_number'],
        'loading_format' => $row['loading_format'],
        'info' => $row['info']
      ));
    }

    return $units;
  }
   
    public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Unit WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $unit = new unit(array(
        'id' => $row['id'],
        'waybill_id' => $row['waybill_id'],
        'productname' => $row['productname'],
        'weight' => $row['weight'],
        'velocity' => $row['velocity'],
        'demand' => $row['demand'],
        'un_number' => $row['un_number'],
        'loading_format' => $row['loading_format'],
        'info' => $row['info']
      ));

      return $unit;
    }

    return null;
  
  }
    public function save(){
    $query = DB::connection()->prepare('INSERT INTO Unit (waybill_id, productname, weight, velocity,demand, un_number, loading_format, info) VALUES ( :waybill_id, :productname, :weight, :velocity,:demand, :un_number, :loading_format, :info) RETURNING id');
    $query->execute(array('waybill_id' => $this->waybill_id, 'productname' => $this->productname,'weight'=> $this->weight, 'velocity'=>  $this->velocity,'demand'=>  $this->demand, 'un_number'=>  $this->un_number, 'loading_format'=>  $this->loading_format,'info'=> $this->info));
    $row = $query->fetch();
    
    
   $this->id = $row['id'];
  }
    public function update(){

    $query = DB::connection()->prepare('UPDATE Unit (id, waybill_id, productname, weight, velocity,demand, un_number, loading_format, info) VALUES (:id, :waybill_id, :productname, :weight, :velocity,:demand, :un_number, :loading_format, :info) RETURNING id;');
    $query->execute(array('id' => $this->id, 'waybill_id' => $this->waybill_id, 'productname' => $this->productname,'weight'=> $this->weight, 'velocity'=>  $this->velocity,'demand'=>  $this->demand, 'un_number'=>  $this->un_number, 'loading_format'=>  $this->loading_format,'info'=> $this->info));
    $row = $query->fetch();
    
    /*Kint::trace();
    Kint::dump($row);*/
   // $this->id = $row['id'];
  }
  
    public function delete($id){
    $query = DB::connection()->prepare('DELETE FROM Unit WHERE id= :id RETURNING id');
    $query->execute(array('id'=> $id));
    $row = $query->fetch();
    
  
    Kint::dump($row);
   $this->id = $row['id'];
  }
  }

