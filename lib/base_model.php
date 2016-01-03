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
       
       $errors_customer = $this->validate_number($this->customer_id);
       $errors_receiver = $this->validate_number($this->receiver_id);
       $errors_date = $this->validate_date($this->arrived);
       
       $errors = array_merge($errors, $errors_customer);
       $errors = array_merge($errors, $errors_receiver);
       $errors = array_merge($errors, $errors_date);
       
       return $errors;
       
    }
    //Tulevat jos aikaa jää
    
    public function validate_customer(){

    }
    public function validate_receiver(){
       
    }
    
    public function validate_unit(){
       
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
       //Tarkistetaan onko tyhjä
     $errors = $this->validate_empty($int);
     
     if(is_numeric($int) == FALSE){
        $errors[] = 'Arvo: ' . $int . ' ei ole luku!';
     }
     
     return $errors;
    }
    
     public function validate_string($string){
        $errors = array_merge($errors, $this->validate_empty($date));
     
        if(is_string($int) == FALSE){
         $errors[] = 'Arvo ' . $string . ' ei ole merkkijono!';
        }
     
     return $errors;
    }
    
    public function validate_length($val,$length){
      $errors = array_merge($errors, $this->validate_empty($date));
        
     
     if(strlen($val) >= $length){
        $errors[] = 'Tämä ei ole tarpeeksi pitkä!';
     }
     
     return $errors;
    }
    
    public function validate_date($date){
       //Tarkistetaan onko tyhjä
       
        $errors = $this->validate_empty($date);
        
        try{   
           $date = new DateTime($date);
        }  catch (Exception $e){
           
           $errors[] = 'Arvo '. $date . ' ole aikamuodossa!';
        }
        
        
     /*   $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);
     
     if(is_numeric($year) == FALSE){
        $errors[] = 'Vuosi ei ole luku';
     }
     if(is_numeric($month) == FALSE){
        $errors[] = 'Kuukausi ei ole luku';
     }
     if(is_numeric($day) == FALSE){
        $errors[] = 'Päivä ei ole luku';
     }
     $year = (int) $year;
     $month = (int) $month;
     $day = (int) $day;
     
     if($month > 12 || $month < 1){
        $errors[] = 'Kuukausi on väärä!';
     }
  
       */      
     return $errors;
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
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
