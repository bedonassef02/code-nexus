<?php declare(strict_types=1);

namespace App\DRY\After\User;

class Manager
{
    public function getUserProfile(array $user): string
    {
        return $this->formatProfile('Name', $user);
    }

    public function getAdminProfile(array $admin): string
    {
        return $this->formatProfile('Admin', $admin);
    }

    private function formatProfile(
        string $prefix,
        array $user
    ): string {
        $fullName = $user['firstName'] . ' ' . $user['lastName'];
        $email = strtolower($user['email']);
        return "$prefix: $fullName, Email: $email";
    }
}