<?php declare(strict_types=1);

namespace App\KISS\After;


class Register
{
    public function __construct(
        private ?Register\Validator $validator = null
    ) {
        $this->validator ??= new Register\Validator;
    }

    public function __invoke(
        array $data
    ){
        ($this->validator)($data);

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
        $this->sendEmail($data['email']);

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

    private function sendEmail(
        string $email
    ): void {
        mail(
            $email,
            'Registration Successful',
            'Welcome to our platform!'
        );
    }
}