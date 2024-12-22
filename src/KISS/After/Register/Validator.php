<?php declare(strict_types=1);

namespace App\KISS\After\Register;

class Validator
{
    public function __invoke(
        array $data
    ): void {
        $this->validateData($data);
        $this->validateUsername($data['username']);
        $this->validatePassword($data['password']);
        $this->validateEmail($data['email']);
    }

    private function validateData(
        array $data
    ): void {
        if (empty($data['username']) || empty($data['password']) || empty($data['email']))
            throw new \Exception('All fields are required.');
    }

    private function validateUsername(
        string $username
    ): void {
        if (strlen($username) < 5)
            throw new \Exception('Username must be at least 5 characters long.');
    }

    private function validatePassword(
        string $password
    ): void {
        if (!preg_match(
                '/[A-Za-z]/',
                $password
            ) ||
            !preg_match(
                '/\d/',
                $password
            )
        )
            throw new \Exception('Password must contain at least one letter and one number.');
    }

    private function validateEmail(
        string $email
    ): void {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            throw new \Exception('Invalid email format.');
    }
}