<?php

  $routes->get('/login', function(){
   UserController::login();
  });
  
   $routes->post('/login', function(){
   //ei jostaan syystä login tule tänne
   UserController::handle_login();
  });

  $routes->get('/info', function() {
    HelloWorldController::info();
  });
  
  $routes->get('waybill/edit', function($id){
  WaybillController::edit($id);
  });
  
   $routes->get('/waybill/:id/edit', function($id){
  WaybillController::update($id);
  });
  
   $routes->get('/waybill/:id/destroy', function($id){
  WaybillController::destroy($id);
  });
  
  $routes->get('/waybill/search', function() {
    //Ei kysy kirjautumistietoja
    //BaseController::check_logged_in();
   WaybillController::search();
  });

 $routes->get('/waybill/found/:id', function($id) {
   WaybillController::find($id);
  });
  
  $routes->post('/waybill', function(){
   WaybillController::store();
  });
  
   $routes->get('/waybill/new', function() {
   WaybillController::customers();
  });
  
   $routes->get('/waybill/:id/unit', function($id) {
   WaybillController::newUnit($id);
  });
  
   $routes->get('/waybill/new', function() {
   WaybillController::listUnits();
  });
  
  $routes->get('/waybill/new', function() {
   WaybillController::create();
  });
  
// Näyttää yhden rahtikirjan ID:n mukaan
  $routes->get('/waybill/:id/show', function($id) {
   WaybillController::show($id);
  });
  
  $routes->get('/receiver', function() {
     //Ei kysy kirjautumistietoja
    //BaseController::check_logged_in();
     ReceiverController::index();
  });
  // Listaa kaikki rahtikirjat
 $routes->get('/customer', function() {
    //Ei kysy kirjautumistietoja
    //BaseController::check_logged_in();
    CustomerController::index();
  });
  
// Listaa kaikki rahtikirjat
 $routes->get('/waybill', function() {
    //Ei kysy kirjautumistietoja
    //BaseController::check_logged_in();
    WaybillController::index();
  });
  $routes->get('/', function() {
    HelloWorldController::listWaybills();
  });
  
  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
