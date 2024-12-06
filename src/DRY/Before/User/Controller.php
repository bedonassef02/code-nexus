<?php declare(strict_types=1);

namespace App\DRY\Before\User;

class Controller
{
    public function __construct(
        private array $users = []
    ) { }

    public function register(array $data): void
    {
        if (
            empty(
            $data['email'])
            ||
            !filter_var(
                $data['email'],
                FILTER_VALIDATE_EMAIL
            )
        ) {
            http_response_code(422);
            echo json_encode([
                'error' => 'Invalid email'
            ]);
            return;
        }

        if (empty($data['password'])) {
            http_response_code(422);
            echo json_encode(['error' => 'Invalid password']);
            return;
        }

        $this->users[] = $data;
        http_response_code(201);
        echo json_encode([
            'message' => 'User created'
        ]);
    }

    public function login(array $data): void
    {
        if (
            empty(
            $data['email'])
            ||
            !filter_var(
                $data['email'],
                FILTER_VALIDATE_EMAIL
            )
        ) {
            http_response_code(422);
            echo json_encode([
                'error' => 'Invalid email'
            ]);
            return;
        }

        if (empty($data['password'])) {
            http_response_code(422);
            echo json_encode([
                'error' => 'Invalid password'
            ]);
            return;
        }

        foreach ($this->users as $user) {
            if ($user['email'] === $data['email'] && $user['password'] === $data['password']) {
                http_response_code(200);
                echo json_encode([
                    'message' => 'Login successful'
                ]);
                return;
            }
        }
        http_response_code(401);
        echo json_encode([
            'error' => 'Invalid credentials'
        ]);
    }
}