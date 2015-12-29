<?php

$routes->get('/info', function() {
    HelloWorldController::info();
  });
  

$routes->get('/kuljetukset/auto/vaihda', function() {
    HelloWorldController::car_change();
  });

$routes->get('/kuljetukset/auto', function() {
    HelloWorldController::car_view();
  });

$routes->get('/kuljetukset', function() {
    HelloWorldController::transport();
  });
  
  $routes->get('/waybill/search', function() {
   WaybillController::search();
  });

 $routes->get('/waybill/found/:id', function($id) {
   WaybillController::find($id);
  });
  
  $routes->post('/waybill', function(){
   WaybillController::store();
  });
  
  $routes->get('/waybill/new', function() {
   WaybillController::create();
  });
  
// Näyttää yhden rahtikirjan ID:n mukaan
  $routes->get('/waybill/:id', function($id) {
   WaybillController::show($id);
  });
  
  $routes->get('/receiver', function() {
     ReceiverController::index();
  });
  // Listaa kaikki rahtikirjat
 $routes->get('/customer', function() {
    CustomerController::index();
  });
  
// Listaa kaikki rahtikirjat
 $routes->get('/waybill', function() {
    WaybillController::index();
  });
  
  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
