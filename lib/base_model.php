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
       
       $errors = $this->{validate_int}($this->customer_id);
       $errors = $this->{validate_int}($this->receiver_id);
       $errors = $this->{validate_int}($this->unit_id);
       $errors = $this->{validate_int}($this->amount);
       
       
    }
    public function validate_customer(){
       
    }
    public function validate_receiver(){
       
    }
    
    public function validate_unit(){
       
    }
    // yleisvalidaattorit
    public function validate_empty($val){
        $errors = array();
        if($val == '' || $$val == NULL){
        $errors[] = 'Määrä ei voi olla nolla.';
     } 
     return $errors;
    }
    
    public function validate_int($int){
     $errors = array();
     
     if( is_integer($int) == FALSE){
        $errors[] = 'Tämä ei ole integer';
     }
     
     return $errors;
    }
    
     public function validate_string($string){
        $errors = array();
     
        if(is_string($int) == FALSE){
         $errors[] = 'Tämä ei ole integer';
        }
     
     return $errors;
    }
    
    public function validate_length($val,$length){
      $errors = array();
        
     
     if(strlen($val) >= $length){
        $errors[] = 'Tämä ei ole integer';
     }
     
     return $errors;
    }
    
    public function validate_date($date){
        $errors = array();
        $year = substr($date, 0, 4);
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
     if(checkdate($month, $day, $year)){
        $errors[] = 'Päivämäärä ei ole oikea';
     }
     return $errors;
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();

      foreach($this->validators as $validator){
        $method_name = $validator;
        $validator_errors = $this->{$method_name}();
        
        $errors = array_merge($errors, $validator_errors);
      }

      return $errors;
    }

  }
