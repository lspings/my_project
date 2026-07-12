<?php

namespace App\Controller;

use App\Service\UserService;

class UserController
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function getUsers(int $page = 1, int $limit = 10): array
    {
        return $this->userService->getUsers($page, $limit);
    }

    public function create(array $data)
    {
        return $this->userService->createUser($data);
    }
}