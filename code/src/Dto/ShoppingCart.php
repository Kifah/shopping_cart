<?php
/**
 * Created by PhpStorm.
 * User: kab
 * Date: 04.09.18
 * Time: 12:06
 */

namespace App\Dto;


class ShoppingCart extends AbstractDto
{


    /**
     * @var int
     */
    protected $id;

    /**
     * @var []
     */
    protected $shoppingCartItems;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): ShoppingCart
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return array
     */
    public function getShoppingCartItems()
    {
        return $this->shoppingCartItems;
    }

    /**
     * @param mixed $shoppingCartItems
     */
    public function setShoppingCartItems($shoppingCartItems): ShoppingCart
    {
        $this->shoppingCartItems = $shoppingCartItems;
        return $this;
    }


}