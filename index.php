<?php

use Controllers\AnimalController;
use Controllers\EncloController;

require 'vendor/autoload.php';



$request = explode('?', $_SERVER['REQUEST_URI'])[0];

switch ($request) {
    //case '/':
    //require __DIR__ . '/views/index.php';
    //break;


  case '/addanimal':
    $AnimalController = new AnimalController;
    $AnimalController->add();
    break;
  case '/':

    $AnimalController = new AnimalController;
    $AnimalController->index();
    break;
  case '/animal':
    if (isset($_GET['id'])) {
      $AnimalController = new AnimalController;
      $AnimalController->single();
    } else {
      echo 'id manquant';
    }

    break;

  case '/enclos':

    $EncloController = new EncloController;
    $EncloController->index();
    break;
  case '/enclo':
    $EncloController = new EncloController;
    $EncloController->single();
    break;
  default:
    http_response_code(404);
    require __DIR__ . '/view/404.php';
    break;
}
