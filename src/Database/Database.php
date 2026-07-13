<?php

namespace App\Database;

use PDO;


class Database
{
    private PDO $pdo;


    public function __construct()
    {

        $dotenv = \Dotenv\Dotenv::createImmutable(
            dirname(__DIR__, 2)
        );

        $dotenv->load();


        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];



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