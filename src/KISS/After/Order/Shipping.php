<?php declare(strict_types=1);

namespace App\KISS\After\Order;

class Shipping
{
    public function __invoke(
        $address
    ): int {
        if ($address['country'] == 'US')
            return 5;

        return 15;
    }
}