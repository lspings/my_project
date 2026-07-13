<?php

namespace App\Repository;

use App\Database\Database;
use PDO;

class UserRepository
{
    private PDO $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // 이메일로 회원 조회(로그인)
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

    // 회원 목록 조회(페이징)
    public function findAll(int $offset, int $limit)
    {
        $sql = "
            SELECT
                id,
                username,
                email,
                created_at
            FROM users
            ORDER BY id DESC
            LIMIT :offset, :limit
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    // 전체 회원 수
    public function count()
    {
        $sql = "SELECT COUNT(*) FROM users";

        $stmt = $this->db->query($sql);

        return (int)$stmt->fetchColumn();
    }



    // 회원 등록
    public function create(array $data): bool
    {
        $sql = "
            INSERT INTO users (
                username,
                email,
                password
            )
            VALUES (
                :username,
                :email,
                :password
            )
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'username' => $data['username'],
            'email'    => $data['email'],
            'password' => $data['password']
        ]);
    }

    // 회원 조회
    public function findById(int $id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch();
    }

    // 회원 정보 수정
    public function update(int $id, array $data)
    {
        $sql = "
            UPDATE users
            SET 
                username = :username,
                email = :email
            WHERE id = :id
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':id' => $id
        ]);
    }

    // 회원 삭제
    public function delete(int $id)
    {
        $sql = "DELETE FROM users WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id'=>$id
        ]);
    }

}