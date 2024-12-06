<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$controller = new \App\DRY\Before\User\Controller();
//$controller = new \App\DRY\After\User\Controller();

$controller->register(['email' => '2F2dD@example.com', 'password' => 'password']);
$controller->login(['email' => '2F2dD@example.com', 'password' => 'password']);
$controller->login(['email' => '2F2dD@example.com', 'password' => 'password1']);