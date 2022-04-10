<?php

namespace Modeles;

use PDO;
use App\Entity;
use Soingeurs\Soigneur;


class SoigneurModel extends Entity
{

  public function getAll()
  {

    $req = $this->pdo->prepare("SELECT *
    FROM soingeur  ");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_CLASS, Soigneur::class);
    $result = $req->fetchAll();

    return $result;
  }
}
