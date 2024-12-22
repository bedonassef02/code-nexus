<?php declare(strict_types=1);

namespace App\KISS\After\Order;

class Promo
{
    public function __invoke(
        $promoCode
    ): float|int {
        if ($promoCode == 'DISCOUNT10')
            return 0.10;

        return 0;
    }
}