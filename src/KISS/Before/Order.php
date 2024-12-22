<?php declare(strict_types=1);

namespace App\KISS\Before;

class Order
{
    public function calculatePrice(
        $items,
        $shippingAddress,
        $promoCode = null
    ): float|int {
        $totalPrice = 0;

        foreach ($items as $item)
            $totalPrice += $item['price'] * $item['quantity'];

        if ($promoCode) {
            $promoDiscount = $this->getPromoDiscount($promoCode);
            if ($promoDiscount)
                $totalPrice -= $totalPrice * $promoDiscount;
        }

        $totalPrice += $this->calculateShippingCost($shippingAddress) * 0.10;

        if ($totalPrice < 0)
            throw new \Exception("Final price can't be negative.");

        return $totalPrice;
    }

    private function getPromoDiscount(
        $promoCode
    ): float|int {
        if ($promoCode == 'DISCOUNT10')
            return 0.10;

        return 0;
    }

    private function calculateShippingCost(
        $address
    ): int {
        if ($address['country'] == 'US')
            return 5;

        return 15;
    }
}