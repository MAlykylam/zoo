<?php

namespace Modeles;

use PDO;

class BDD
{
    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DBNAME = 'z00';
    const PORT = '3306';

    private $pdo;
    public function getPdo()
    {
        return $this->pdo;
    }

    public function __construct()
    {
    }

    public function connect()
    {
        $this->pdo = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::DBNAME, self::USER, self::PASS);;
    }
}
