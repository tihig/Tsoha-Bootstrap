<?php

class unit extends BaseModel{
   
   public  $id, $waybill_id, $productname, $weight, $velocity,$demand, $un_number, $loading_format, $info;

   public function __construct($attributes){
    parent::__construct($attributes);
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
  }

