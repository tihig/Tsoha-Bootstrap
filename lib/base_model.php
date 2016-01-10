<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }
    //waybill- validaattorit
    
    public function validate_waybill(){
       $errors = array();
       
       $errors_customer_empty = $this->validate_empty($this->customer_id);
       $errors_receiver_empty = $this->validate_empty($this->receiver_id);
       $errors_date_empty = $this->validate_empty($this->arrived);
       
       $errors_customer = $this->validate_number($this->customer_id);
       $errors_receiver = $this->validate_number($this->receiver_id);
       $errors_date = $this->validate_date($this->arrived);
       
       $errors = array_merge($errors, $errors_customer);
       $errors = array_merge($errors, $errors_receiver);
       $errors = array_merge($errors, $errors_date);
       
        $errors = array_merge($errors, $errors_customer_empty);
       $errors = array_merge($errors, $errors_receiver_empty);
       $errors = array_merge($errors, $errors_date_empty);
       
       return $errors;
       
    }
    //Tulevat jos aikaa jää
    
    public function validate_customer(){
          $errors = array();
       
       $errors_name_empty = $this->validate_empty($this->name);
       $errors_phone_empty = $this->validate_empty($this->phone);
       $errors_e_mail_empty = $this->validate_empty($this->e_mail);
       
       $errors_name = $this->validate_string($this->name);
       $errors_phone = $this->validate_phone($this->phone);
       $errors_e_mail = $this->validate_email($this->e_mail);
       
       $errors = array_merge($errors, $errors_name_empty);
       $errors = array_merge($errors, $errors_phone_empty);
       $errors = array_merge($errors, $errors_e_mail_empty);
       
       $errors = array_merge($errors, $errors_name);
       $errors = array_merge($errors, $errors_phone);
       $errors = array_merge($errors, $errors_e_mail);
       
       return $errors;

    }
    public function validate_receiver(){
        $errors = array();
        
        //errors name, phone, e_mail
        $errors_npe = $this->validate_customer();
        
        $errors_address = $this->validate_empty($this->address);
        $errors_postcode = $this->validate_postcode($this->postcode);
        $errors_city = $this->validate_city($this->city);
        
       $errors = array_merge($errors, $errors_npe);
       $errors = array_merge($errors, $errors_address);
       
       return $errors;
    }
    
    public function validate_unit(){
       $errors = array();
       //validate_strings
       $errors_productname = $this->validate_string($this->productname);
       $errors_demand = $this->validate_string($this->demand);
       $errors_loading_format = $this->validate_string($this->loading_format);
       $errors_info = $this->validate_string($this->info);
       
       //validate_ints
       $errors_weight = $this->validate_int($this->weight);
       $errors_velocity = $this->validate_int($this->velocity);
       $errors_un_number = $this->validate_int($this->un_number);
       
       
       $errors = array_merge($errors, $errors_customer);
       $errors = array_merge($errors, $errors_receiver);
       $errors = array_merge($errors, $errors_date);
       
       return $errors;
    }
    // yleisvalidaattorit
    public function validate_empty($val){
        $errors = array();
        if($val == '' || $val == NULL){
        $errors[] = 'Arvon ' . $val . 'pituus ei voi olla nolla.';
     } 
     return $errors;
    }
    
    public function validate_number($int){
      $errors = array();
     if(is_numeric($int) == FALSE){
        $errors[] = 'Arvo: ' . $int . ' ei ole luku!';
     }
     
     return $errors;
    }
    
     public function validate_string($string){
      $errors = array();
        if(is_string($string) == FALSE){
         $errors[] = 'Arvo ' . $string . ' ei ole merkkijono!';
        }
     
     return $errors;
    }
    
    public function validate_length($val,$length){
      $errors = array();
     if(strlen($val) >= $length){
        $errors[] = 'Arvo '. $val . ' ei ole tarpeeksi pitkä!';
     }
     
     return $errors;
    }
    
    public function validate_date($date){
         $errors = array();
        try{   
           $date = new DateTime($date);
        }  catch (Exception $e){
           
           $errors[] = 'Arvo '. $date . ' ole aikamuodossa!';
        }
        
     return $errors;
    }
    // attribuutteihin liittyvät validaattorit
    public function validate_email($email){
        $errors = array();
        if(!strpos($email, '@')){
            $errors[] = 'Sähköpostista puuttuu @-merkki!';
        }
       if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errors[] = 'Sähköposti ei ole oikeassa muodossa!';
       }
       return $errors;
       
    }
    
     public function validate_phone($phone){
          $errors = array();
          
          $firstnumber = substr($phone, 0, 1);
          
          if(!is_numeric($firstnumber)){
             if($firstnumber != '+'){
              $errors[] = 'Ensimmäinen merkki puhelinnumerossa vain numero tai + !';
             }
          }
          
          if(!is_numeric($phone)){
             $errors[] = 'Puhelinnumeron (ilman +- merkkiä) tulee sisältää vain numeroita!';
          }
          return $errors;
       
    }
  
    public function validate_postcode($postcode){
       $errors = array();
      if(!is_numeric($postcode)|| strlen($postcode) >= 6){
        $errors[] = 'Arvo: ' . $postcode . ' ei ole postinumeromuodossa!';
         }
       
       return $errors;
    }
    
    public function validate_city($city){
       $errors = $this->validate_empty($city);
       
        array_merge($errors, $this->validate_string($city));
        
        return $errors;
    }

    public function errors(){
      $errors = array();

      foreach($this->validators as $validator){
        $method_name = $validator;
        $validator_errors = $this->{$method_name}();
        
        if($validator_errors != null){
        $errors = array_merge($errors, $validator_errors);
        }
      }

      return $errors;
    }

  }
