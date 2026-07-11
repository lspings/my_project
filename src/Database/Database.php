<?php

namespace App\Database;

use PDO;

class Database
{
    private PDO $pdo;

    public function __construct()
    {
        $host = "localhost";
        $dbname = "flutter_api";
        $username = "root";
        $password = "";

        $this->pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
            $username,
            $password
        );

        $this->pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    }


    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}