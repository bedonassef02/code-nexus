<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

//$order = new \App\KISS\Before\Order;
$order = new \App\KISS\After\Order;

echo $order->calculatePrice(
    [
        ['price' => 10, 'quantity' => 2],
        ['price' => 20, 'quantity' => 1],
    ],
    ['country' => 'US'],
    'DISCOUNT10'
);