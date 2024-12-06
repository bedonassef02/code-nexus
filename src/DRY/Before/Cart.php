<?php declare(strict_types=1);

namespace App\DRY\Before;

class Cart
{
    public function calculateTotal(array $items): float
    {
        $total = 0;
        foreach ($items as $item) {
            $discountedPrice = $item['price'];
            if ($item['category'] === 'electronics')
                $discountedPrice *= 0.9;

            if ($item['quantity'] > 3)
                $discountedPrice *= 0.8;

            $total += $discountedPrice * $item['quantity'];
        }
        return $total;
    }

    public function calculateItemPrice(array $item): float
    {
        $price = $item['price'];
        if ($item['category'] === 'electronics')
            $price *= 0.9;

        if ($item['quantity'] > 3)
            $price *= 0.8;

        return $price * $item['quantity'];
    }
}