<?php


namespace App\Factory;


use App\Entity\ShoppingCart;

class ShoppingCartFactory
{
    public static function createShoppingCartEntity()
    {
        $shoppingCartEntity = new ShoppingCart();
        return $shoppingCartEntity;
    }

}