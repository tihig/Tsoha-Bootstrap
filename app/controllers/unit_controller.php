<?php

class UnitController extends BaseController{
   public static function index(){
    $units = unit::all();
    View::make('unit/index.html', array('units' => $units));
  }
}

