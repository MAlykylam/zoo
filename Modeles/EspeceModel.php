<?php

namespace Modeles;

use PDO;
use App\Entity;
use Especes\Espece;


class EspeceModel extends Entity
{

  public function getAll()
  {

    $req = $this->pdo->prepare("SELECT *
    FROM espece ");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_CLASS, Espece::class);
    $result = $req->fetchAll();

    return $result;
  }
}
