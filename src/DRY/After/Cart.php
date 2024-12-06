<?php declare(strict_types=1);

namespace App\DRY\After;


class Cart
{
    public function calculateTotal(array $items): float
    {
        $total = 0;
        foreach ($items as $item)
            $total += $this->calculateItemPrice($item);

        return $total;
    }

    public function calculateItemPrice(array $item): float
    {
        return $this->applyDiscount($item) * $item['quantity'];
    }

    private function applyDiscount(array $item): float
    {
        $discountedPrice = $item['price'];
        if ($item['category'] === 'electronics')
            $discountedPrice *= 0.9;

        if ($item['quantity'] > 3)
            $discountedPrice *= 0.8;

        return $discountedPrice;
    }
}