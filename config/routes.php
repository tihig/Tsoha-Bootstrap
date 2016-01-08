<?php

   function check_logged_in(){
      BaseController::check_logged_in();
   }

   $routes->post('/logout', function(){
      UserController::logout();
   });
   
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
  
  
  $routes->get('/waybill/:id/edit', function($id){
  WaybillController::edit($id);
  });
  
  $routes->post('/waybill/:id/edit', function($id){
  WaybillController::update($id);
  });
  
   $routes->get('/waybill/:id/destroy', function($id){
  WaybillController::destroy($id);
  });
  
  $routes->get('/waybill/search','check_logged_in', function() {
   WaybillController::search();
  });
  $routes->get('/waybill/found/:id', function($id) {
   WaybillController::find($id);
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
  
  // Näyttää yhden rahtikirjan ID:n mukaan
  $routes->get('/waybill/:id/show', function($id) {
   WaybillController::show($id);
  });
  
   $routes->post('/waybill/unit', function() {
   WaybillController::storeUnit();
  });
  
   $routes->get('/waybill/:id/unit', function($id) {
   WaybillController::createUnit($id);
  });
  
  $routes->get('/waybill/:id/destroyunit', function($id){
  WaybillController::destroyUnit($id);
  });
  
  $routes->get('/waybill/new', function() {
   WaybillController::create();
  });
  
  //Vastaanottajat
  $routes->get('/receiver/:id/destroy', function($id){
     ReceiverController::destroy($id);
  });
     $routes->post('/receiver', function(){
        ReceiverController::store();
  });
  
   $routes->get('/receiver/new','check_logged_in', function() {
     ReceiverController::create();
  });
  
  
  $routes->get('/receiver','check_logged_in', function() {
     ReceiverController::index();
  });
  
  // Lähettäjät
  
   $routes->get('/customer/:id/destroy', function($id){
      CustomerController::destroy($id);
  });
  
   $routes->post('/customer', function(){
      CustomerController::store();
  });
  
  $routes->get('/customer/new', function() {
     CustomerController::create();
  });
  
 $routes->get('/customer', 'check_logged_in', function() {
    CustomerController::index();
  });
  
// Listaa kaikki rahtikirjat
  
 $routes->get('/waybill', 'check_logged_in', function() {
    WaybillController::index();
  });
  
  $routes->get('/', 'check_logged_in', function() {
    HelloWorldController::listWaybills();
  });
  
  $routes->get('/', 'check_logged_in',function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
