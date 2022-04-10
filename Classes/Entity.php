<?php

namespace App;

abstract class Entity
{

  protected $pdo;


  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }
}
