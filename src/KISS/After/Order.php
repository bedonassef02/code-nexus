<?php declare(strict_types=1);

namespace App\KISS\After;

class Order
{
    public function __construct(
        private ?Order\Promo $promo = null,
        private ?Order\Shipping $shipping = null
    ) {
        $this->promo ??= new Order\Promo;
        $this->shipping ??= new Order\Shipping;
    }

    public function calculatePrice(
        $items,
        $shippingAddress,
        $promoCode = null
    ): float|int {
        $totalPrice = 0;

        foreach ($items as $item)
            $totalPrice += $item['price'] * $item['quantity'];

        if ($promoCode) {
            $promoDiscount = ($this->promo)($promoCode);
            if ($promoDiscount)
                $totalPrice -= $totalPrice * $promoDiscount;
        }

        $totalPrice += ($this->shipping)($shippingAddress) * 0.10;

        if ($totalPrice < 0)
            throw new \Exception("Final price can't be negative.");

        return $totalPrice;
    }
}