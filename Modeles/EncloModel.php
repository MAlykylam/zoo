<?php

namespace Modeles;

use PDO;
use App\Entity;
use Enclos\Enclo;

class EncloModel extends Entity
{

  public function getAll()
  {

    $req = $this->pdo->prepare(/*"SELECT e.* COUNT(DISTINCT(a.idAnimal)) as Nombre, en.*  FROM enclos e, environnement en, animal a WHERE e.idEnclos= a.idEnclos 
    AND e.IdEnvironnement = en.IdEnvironnement 
    GROUP by e.idEnclos "*/

      "SELECT e.*, en.name, COUNT(DISTINCT(a.idAnimal)) as Nombre  FROM enclos e
LEFT JOIN animal a ON 
e.idEnclos= a.idEnclos
LEFT JOIN environnement en ON 
e.IdEnvironnement = en.IdEnvironnement 
group by e.idEnclos
"


    );


    $req->execute();
    $req->setFetchMode(PDO::FETCH_CLASS, Enclo::class);
    $result = $req->fetchAll();

    return $result;
  }
  public function getOne($id)
  {

    $req = $this->pdo->prepare("SELECT e.*, COUNT(DISTINCT(a.idAnimal)) as Nombre, en.*, a.name as Nom  FROM enclos e, environnement en, animal a WHERE e.idEnclos= a.idEnclos 
    AND e.IdEnvironnement = en.IdEnvironnement 
    AND e.idEnclos=:id");
    $req->bindparam(':id', $id);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_CLASS, Enclo::class);
    $result = $req->fetch();
    return $result;
  }



  public function getOtherA($id)
  {

    $req = $this->pdo->prepare("SELECT a.name as Nom  FROM enclos e, animal a WHERE e.idEnclos= a.idEnclos 
    AND e.idEnclos=:id");
    $req->bindparam(':id', $id);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_CLASS, Enclo::class);
    $result = $req->fetchAll();

    return $result;
  }
}
