<?php

namespace App\Controller;

use App\Service\AuthService;

class AuthController
{
    private AuthService $authService;


    public function __construct()
    {
        $this->authService = new AuthService();
    }


    public function login()
    {
        session_start();

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->authService->login(
            $email,
            $password
        );


        if ($user) {

            $_SESSION['user'] = [
                                    'id' => $user['id'],
                                    'username' => $user['username'],
                                    'email' => $user['email']
                                ];

                                echo json_encode([
                                    'success' => true
                                ]);

        } else {

            echo json_encode([
                'success' => false,
                'message' => '로그인 실패'
            ]);

        }
    }
}