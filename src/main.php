<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

//$register = new \App\KISS\Before\Register;
$register = new \App\KISS\After\Register;

$user = $register([
    'username' => 'username',
    'password' => 'password1',
    'email' => '5QOoU@example.com']
);

dd($user);