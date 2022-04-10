<?php

namespace Modeles;

use PDO;
use App\Entity;
use Regimes\Regime;


class RegimeModel extends Entity
{

  public function getAll()
  {

    $req = $this->pdo->prepare("SELECT *
    FROM regimealimentaire ");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_CLASS, Regime::class);
    $result = $req->fetchAll();

    return $result;
  }
}
