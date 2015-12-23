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

$routes->get('/rahtikirjat/lisaa', function() {
    HelloWorldController::waybill_add();
  });

$routes->get('/rahtikirjat/m', function() {
    HelloWorldController::waybill_modify();
  });

$routes->get('/rahtikirjat/1', function() {
    HelloWorldController::waybill_show();
  });

 $routes->get('/rahtikirjat', function() {
    HelloWorldController::waybill_list();
  });

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
