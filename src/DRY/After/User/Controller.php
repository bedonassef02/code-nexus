<?php declare(strict_types=1);

namespace App\DRY\After\User;

class Controller extends Controller\Base
{
    public function __construct(
        private array $users = []
    ) { }

    public function register(array $data): void
    {
        $errors = $this->validate($data, [
            'email' => 'email',
            'password' => 'required',
        ]);

        if ($errors)
            $this->respond(['errors' => $errors], 422);

        $this->users[] = $data;
        $this->respond([
            'message' => 'User registered'
        ],
            201
        );
    }

    public function login(array $data): void
    {
        $errors = $this->validate($data, [
            'email' => 'email',
            'password' => 'required',
        ]);

        if ($errors)
            $this->respond(['errors' => $errors], 422);

        foreach ($this->users as $user) {
            if ($user['email'] === $data['email'] && $user['password'] === $data['password'])
                $this->respond(['
                message' => 'Login successful'
                ]);
        }

        $this->respond([
            'error' => 'Invalid credentials'
        ],
            401
        );
    }
}