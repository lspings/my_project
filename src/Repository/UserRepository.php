<?php

namespace App\Repository;

use App\Database\Database;

class UserRepository
{
    private $db;


    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }


    public function findByEmail(string $email)
    {
        $sql = "
            SELECT *
            FROM users
            WHERE email = :email
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'email' => $email
        ]);

        return $stmt->fetch();
    }
}