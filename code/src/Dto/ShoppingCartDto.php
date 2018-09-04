<?php
/**
 * Created by PhpStorm.
 * User: kab
 * Date: 04.09.18
 * Time: 12:06
 */

namespace App\Dto;


use App\Entity\ShoppingCartItem;

class ShoppingCartDto implements \JsonSerializable
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
    public function setId(int $id): ShoppingCartDto
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

    public function addShoppingCartItem(ShoppingCartItemDto $shoppingCartItem)
    {
        $this->shoppingCartItems[] = $shoppingCartItem;
    }

    /**
     * @param mixed $shoppingCartItems
     */
    public function setShoppingCartItems($shoppingCartItems): ShoppingCartDto
    {
        $this->shoppingCartItems = $shoppingCartItems;
        return $this;
    }


    /**
     * Specify data which should be serialized to JSON
     *
     * @link  https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'shopping_cart' => [
                'id'                  => $this->getId(),
                'shopping_cart_items' => $this->getShoppingCartItems()
            ]
        ];
    }
}