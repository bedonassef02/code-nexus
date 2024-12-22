<?php declare(strict_types=1);

namespace App\DRY\After\Auth;

class Mailer
{
    public function __invoke(
        string $email,
        string $subject,
        string $message
    ): void {
        mail(
            $email,
            $subject,
            $message
        );
    }
}