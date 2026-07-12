<?php

namespace App\Service;

use App\Repository\UserRepository;
use App\Validation\UserValidator;

class UserService
{
    private UserRepository $userRepository;
    private UserValidator $validator;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->validator = new UserValidator($this->userRepository);
    }

    // 회원 목록 조회(페이징)
    public function getUsers(int $page = 1, int $limit = 10): array
    {
        $offset = ($page - 1) * $limit;

        return [
            'users' => $this->userRepository->findAll($offset, $limit),
            'total' => $this->userRepository->count(),
            'page'  => $page,
            'limit' => $limit
        ];
    }

    // 회원 생성
    public function createUser(array $data)
    {
        // 입력값 검증
        $this->validator->validateCreate($data);

        // 비밀번호 암호화 후 저장
        return $this->userRepository->create([
            'username' => trim($data['username']),
            'email'    => trim($data['email']),
            'password' => password_hash(
                $data['password'],
                PASSWORD_DEFAULT
            )
        ]);
    }
}