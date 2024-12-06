<?php declare(strict_types=1);

namespace App\DRY\Before\User;

class Manager
{
    public function getUserProfile(array $user): string
    {
        $fullName = $user['firstName'] . ' ' . $user['lastName'];
        $email = strtolower($user['email']);
        return "Name: $fullName, Email: $email";
    }

    public function getAdminProfile(array $admin): string
    {
        $fullName = $admin['firstName'] . ' ' . $admin['lastName'];
        $email = strtolower($admin['email']);
        return "Admin: $fullName, Email: $email";
    }
}