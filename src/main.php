<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

//$cart = new \App\DRY\Before\Cart();
$cart = new \App\DRY\After\Cart();

$items = [
    ['name' => 'Laptop', 'price' => 1000, 'quantity' => 2, 'category' => 'electronics'],
    ['name' => 'Chair', 'price' => 200, 'quantity' => 5, 'category' => 'furniture'],
];

echo "Total: " . $cart->calculateTotal($items) . PHP_EOL;