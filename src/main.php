<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

//$auth = new \App\DRY\Before\Auth;
$auth = new \App\DRY\After\Auth;

$userLogin = $auth->login('H8lq0@example.com', 'password');
$userRegister = $auth->register('H8lq0@example.com', 'password');

dd($userLogin, $userRegister);