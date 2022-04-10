<?php

namespace Controllers;

use Especes\Espece;
use Modeles\AnimalModel;
use Modeles\BDD;
use Modeles\EspeceModel;
use Modeles\RegimeModel;
use Modeles\EncloModel;
use Modeles\SoigneurModel;

final class AnimalController
{

  public function index()
  {

    $bdd = new BDD();
    $bdd->connect();
    $pdo = $bdd->getPdo();
    $Animal = new AnimalModel($pdo);
    $resultAnimals = $Animal->getAll();




    include_once "view/VueAnimals.php";
  }
  public function single()
  {

    $bdd = new BDD();
    $bdd->connect();
    $pdo = $bdd->getPdo();
    $Animal = new AnimalModel($pdo);

    $resultAnimal = $Animal->getOne($_GET['id']);
    $resultOthersAnimal = $Animal->getOthers($_GET['id']);
    $resultAssinger = $Animal->getAssigner($_GET['id']);


    include "view/VueAnimal.php";
  }

  public function add()
  {

    $bdd = new BDD();
    $bdd->connect();
    $pdo = $bdd->getPdo();

    $regime = new RegimeModel($pdo);
    $regimes = $regime->getAll();
    $Espece = new EspeceModel($pdo);
    $Especes = $Espece->getAll();
    $Enclo = new EncloModel($pdo);
    $resultEnclos = $Enclo->getAll();
    $soigneur = new SoigneurModel($pdo);
    $soigneurs = $soigneur->getAll();

    if (isset($_POST['name'])) {
      $Animall = new AnimalModel($pdo);
      $addAnimals = $Animall->postAnimalsAdd()->postAnimalsSoigneur();
    }


    include "view/addAnimal.php";
  }
}
