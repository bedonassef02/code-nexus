<?php declare(strict_types=1);

namespace App\KISS\Before;

class Register
{
    public function __invoke(
        array $data
    ){
        if (empty($data['username']) || empty($data['password']) || empty($data['email']))
            throw new \Exception('All fields are required.');

        if (strlen($data['username']) < 5)
            throw new \Exception('Username must be at least 5 characters long.');

        if (!preg_match(
            '/[A-Za-z]/',
            $data['password']
            ) ||
            !preg_match(
                '/\d/',
                $data['password']
            )
        )
            throw new \Exception('Password must contain at least one letter and one number.');


        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
            throw new \Exception('Invalid email format.');

        $existingUser = $this->getUserByUsername($data['username']);
        if ($existingUser)
            throw new \Exception('Username is already taken.');

        $this->saveUser(
            $data['username'],
            password_hash(
                $data['password'],
                PASSWORD_BCRYPT
            ),
            $data['email']
        );

        mail(
            $data['email'],
            'Registration Successful',
            'Welcome to our platform!'
        );

        return true;
    }

    private function getUserByUsername(
        string $username
    ): array|null {
        return null;
    }

    private function saveUser(
        string $username,
        string $password,
        string $email
    ): void {
        // save user to db
    }
}