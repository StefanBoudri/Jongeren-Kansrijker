<?php

require_once __DIR__ . '/../dbconnect.php';

class Persoon 
{
    public $id;
    public $firstName;
    public $lastName;
    public $birthDate;
    
    static $tableName;

    //Database connectie
    public PDO $mypdo;
    
    public function __construct(PDO $pdo)
    {
        $this->mypdo = $pdo;
    }
}

?>