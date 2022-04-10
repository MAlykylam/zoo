<?php

namespace Modeles;

use PDO;
use App\Entity;
use Animaux\Animal;

class AnimalModel extends Entity
{

  public function getAll()
  {

    $req = $this->pdo->prepare("SELECT *
    FROM animal as a
    LEFT JOIN espece as e ON a.idEspece = e.idEspece
    LEFT JOIN enclos as en ON a.idEnclos = en.idEnclos ");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_CLASS, Animal::class);
    $result = $req->fetchAll();

    return $result;
  }
  public function getOne($id)
  {

    $req = $this->pdo->prepare("SELECT *
    FROM animal as a
    LEFT JOIN espece as e ON a.idEspece = e.idEspece
    LEFT JOIN enclos as en ON a.idEnclos = en.idEnclos
    LEFT JOIN regimealimentaire as r ON a.idRegimeAlimentaire = r.idRegimeAlimentaire
     where idAnimal=:id");
    $req->bindparam(':id', $id);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_CLASS, Animal::class);
    $result = $req->fetch();

    return $result;
  }

  public function getOthers($id)
  {

    $req = $this->pdo->prepare("SELECT * FROM animal  where idAnimal != :id AND idEnclos = (SELECT idEnclos from animal where idAnimal=:id);");
    $req->bindparam(':id', $id);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_CLASS, Animal::class);
    $result = $req->fetchAll();

    return $result;
  }

  public function getAssigner($id)
  {

    $req = $this->pdo->prepare("SELECT * FROM `assinger` a JOIN soingeur s on a.idSoigneur= s.idSoigneur where idAnimal = :id ");
    $req->bindparam(':id', $id);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_CLASS, Animal::class);
    $result = $req->fetchAll();
    return $result;
  }

  public function getAnimals($id)
  {

    $req = $this->pdo->prepare("SELECT * FROM `assinger` a JOIN soingeur s on a.idSoigneur= s.idSoigneur where idAnimal = :id ");
    $req->bindparam(':id', $id);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_CLASS, Animal::class);
    $result = $req->fetchAll();
    return $result;
  }

  public function postAnimalsAdd()
  {

    if (isset($_POST['name'], $_POST['dateN'], $_POST['dateE'], $_POST['sexe'], $_POST['parentM'], $_POST['parentF'], $_POST['photo'], $_POST['traitement'], $_POST['idEspece'], $_POST['idEnclos'], $_POST['idRegimeAlimentaire'])) {
      $name = filter_var($_POST['name'], FILTER_UNSAFE_RAW);
      if (!empty($_POST['dateN'])) {
        $dateN = date("Y-m-d H:i:s", strtotime($_POST['dateN']));
      } else {
        $dateN = null;
      }

      if (!empty($_POST['dateE'])) {
        $dateE = date("Y-m-d H:i:s", strtotime($_POST['dateE']));
      } else {
        $dateE = null;
      }
      $sexe = filter_var($_POST['sexe'], FILTER_UNSAFE_RAW);
      $parentM = filter_var($_POST['parentM'], FILTER_UNSAFE_RAW);
      $parentF = filter_var($_POST['parentF'], FILTER_UNSAFE_RAW);
      $photo = filter_var($_POST['photo'], FILTER_FLAG_STRIP_HIGH);
      $traitement = filter_var($_POST['traitement'], FILTER_UNSAFE_RAW);
      if (!empty($_POST['dateD'])) {
        $dateD = date("Y-m-d H:i:s", strtotime($_POST['dateD']));
      } else {
        $dateD = null;
      }
      $description = filter_var($_POST['description'], FILTER_UNSAFE_RAW);
      $idEspece = filter_var($_POST['idEspece'], FILTER_VALIDATE_INT);
      $idEnclos = filter_var($_POST['idEnclos'], FILTER_VALIDATE_INT);
      $idRegimeAlimentaire = filter_var($_POST['idRegimeAlimentaire'], FILTER_VALIDATE_INT);


      $req = $this->pdo->prepare(" INSERT INTO animal (name ,dateN, dateE,sexe,parentM,parentF,photo,traitement,dateD,description,idEspece,idEnclos,idRegimeAlimentaire) values (:name,:dateN,:dateE,:sexe,:parentM,:parentF,:photo,:traitement,:dateD,:description,:idEspece,:idEnclos,:idRegimeAlimentaire)");

      $req->execute(
        array(
          ":name" => $name,
          ":dateN" => $dateN,
          ":dateE" => $dateE,
          ":sexe" => $sexe,
          ":parentM" => $parentM,
          ":parentF" => $parentF,
          ":photo" => $photo,
          ":traitement" => $traitement,
          ":dateD" => $dateD,
          ":description" => $description,
          ":idEspece" => $idEspece,
          ":idEnclos" => $idEnclos,
          ":idRegimeAlimentaire" => $idRegimeAlimentaire,


        )
      );
    }
    return $this;
  }


  public function postAnimalsSoigneur()
  {
    if (isset($_POST['idSoigneur'])) {

      $idSoigneur = filter_var($_POST['idSoigneur'], FILTER_VALIDATE_INT);


      $req = $this->pdo->prepare(" INSERT INTO assinger (idAnimal ,idSoigneur ) values (:idAnimal ,:idSoigneur )");

      $req->execute(
        array(
          "idAnimal" => $this->pdo->lastInsertId(),
          "idSoigneur" => $idSoigneur,

        )
      );
    }

    return $this;
  }
}
