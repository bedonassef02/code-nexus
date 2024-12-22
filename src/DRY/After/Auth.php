<?php declare(strict_types=1);

namespace App\DRY\After;

class Auth
{
    public function __construct(
        private ?\App\DRY\After\Auth\Mailer $mailer = null
    ) {
        $this->mailer ??= new \App\DRY\After\Auth\Mailer;
    }

    public function login(
        string $email,
        string $password
    ): array|null {
        $user = $this->getUserByEmail($email);
        if ($user && password_verify($password, $user['password']))
            ($this->mailer)(
                $email,
                'Login Successful',
                'You have logged in successfully!'
            );

        return $user;
    }

    public function register(
        $email,
        $password
    ): array|null {
        $this->saveUser(
            $email,
            password_hash(
                $password,
                PASSWORD_BCRYPT
            )
        );
        ($this->mailer)(
            $email,
            'Welcome',
            'Thank you for registering!'
        );
        return [];
    }

    private function getUserByEmail(
        string $email
    ): array {
        return [
            'email' => $email,
            'password' => '$2y$10$12345'
        ];
    }

    private function saveUser(
        string $email,
        string $password
    ): void {
        // Save user to db
    }
}