<?php declare(strict_types=1);

namespace App\DRY\After\User\Controller;

class Base
{
    protected function validate(
        array $data,
        array $rules
    ): array {
        $errors = [];

        foreach ($rules as $field => $rule) {
            if (empty($data[$field]))
                $errors[$field] = "$field is required";
            elseif ($rule === 'email' && !filter_var($data[$field], FILTER_VALIDATE_EMAIL))
                $errors[$field] = "$field must be a valid email";
        }
        return $errors;
    }

    protected function respond(
        array $data,
        int $status = 200
    ): void {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}