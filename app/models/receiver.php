<?php

class receiver extends BaseModel{
   
   public  $id, $name, $address, $postcode, $city, $phone, $e_mail;

   public function __construct($attributes){
    parent::__construct($attributes);
    $this->validators = array('validate_receiver');
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
        'postcode' => $row['postcode'],
        'city' => $row['city'],
        'phone' => $row['phone'],
        'e_mail' => $row['e_mail']
      ));
    }

    return $receivers;
  }
      public function save(){
    $query = DB::connection()->prepare('INSERT INTO Receiver (name, address, postcode, city, phone, e_mail) VALUES ( :name, :address, :postcode, :city, :phone, :e_mail) RETURNING id');
    $query->execute(array('name' => $this->name,'address'=> $this->address, 'postcode'=>$this->postcode, 'city'=>$this->city, 'phone' => $this->phone, 'e_mail' => $this->e_mail));
    $row = $query->fetch();
    
    //Kint::trace();
    //Kint::dump($row);
    
   $this->id = $row['id'];
  }

}