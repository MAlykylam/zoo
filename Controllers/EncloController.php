<?php

namespace Controllers;

use Modeles\EncloModel;
use Modeles\BDD;

final class EncloController
{

  public function index()
  {
    $bdd = new BDD();
    $bdd->connect();
    $pdo = $bdd->getPdo();
    $Enclo = new EncloModel($pdo);
    $resultEnclos = $Enclo->getAll();


    include "view/VueEnclos.php";
  }
  public function single()
  {

    $bdd = new BDD();
    $bdd->connect();
    $pdo = $bdd->getPdo();
    $Enclo = new EncloModel($pdo);
    $resultEnclo = $Enclo->getOne($_GET['id']);
    $resultEncloA = $Enclo->getOtherA($_GET['id']);





    include "view/VueEnclo.php";
  }
}
