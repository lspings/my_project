<?php

namespace App\Validation;

use App\Exception\ValidationException;
use App\Repository\UserRepository;

class UserValidator
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function validateCreate(array $data): void
    {
        $username = trim($data['username'] ?? '');
        $email = trim($data['email'] ?? '');
        $password = $data['password'] ?? '';
        $passwordConfirm = $data['password_confirm'] ?? '';

        $errors = [];

        if ($username === '') {
            $errors['username'] = '이름을 입력하세요.';
        }

        if ($email === '') {

            $errors['email'] = '이메일을 입력하세요.';

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $errors['email'] = '이메일 형식이 올바르지 않습니다.';

        } elseif ($this->userRepository->findByEmail($email)) {

            $errors['email'] = '이미 사용 중인 이메일입니다.';
        }

        if ($password === '') {

            $errors['password'] = '비밀번호를 입력하세요.';

        } elseif (strlen($password) < 8) {

            $errors['password'] = '비밀번호는 8자 이상 입력하세요.';
        }

        if ($passwordConfirm === '') {

            $errors['password_confirm'] = '비밀번호 확인을 입력하세요.';

        } elseif ($password !== $passwordConfirm) {

            $errors['password_confirm'] = '비밀번호가 일치하지 않습니다.';
        }

        if (!empty($errors)) {
            throw new ValidationException($errors);
        }
    }
}