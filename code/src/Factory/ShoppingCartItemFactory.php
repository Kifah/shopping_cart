<?php


namespace App\Factory;


use App\Entity\ShoppingCart;
use App\Entity\ShoppingCartItem;

class ShoppingCartItemFactory
{
    public static function createShoppingCartItemEntity()
    {
        $shoppingCartItemEntity = new ShoppingCartItem();
        return $shoppingCartItemEntity;
    }

}