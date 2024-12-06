<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

//$manager = new \App\DRY\Before\User\Manager();
$manager = new \App\DRY\After\User\Manager();

$user = ['firstName' => 'John', 'lastName' => 'Doe', 'email' => 'John.Doe@Example.com'];
$admin = ['firstName' => 'Admin', 'lastName' => 'User', 'email' => 'Admin.User@Example.com'];

echo $manager->getUserProfile($user);
echo $manager->getAdminProfile($admin);