<?php

namespace Soingeurs;

use App\Entity;

class Soigneur extends Entity
{

  public function getSoingeur($id)
  {

    $req = $this->pdo->prepare("SELECT * FROM `assinger`");

    $req->execute();
    $result = $req->fetchAll();

    return $result;
  }
}
