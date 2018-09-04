<?php
/**
 * Created by PhpStorm.
 * User: kab
 * Date: 04.09.18
 * Time: 11:33
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity()
 */
class ShoppingCartItem
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * Many items have One shopping Cart.
     * @ORM\ManyToOne(targetEntity="App\Entity\ShoppingCart", inversedBy="shoppingCartItems",fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="shopping_cart_id", referencedColumnName="id")
     */
    private $shoppingCart;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    /**
     * @var int
     * @ORM\Column(type="integer", length=40)
     */
    private $count;

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
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getShoppingCart()
    {
        return $this->shoppingCart;
    }


    public function setShoppingCart($shoppingCart): ShoppingCartItem
    {
        $this->shoppingCart = $shoppingCart;
        return $this;

    }

    /**
     * @return mixed
     */
    public function getProduct(): Product
    {
        return $this->product;
    }


    public function setProduct($product): ShoppingCartItem
    {
        $this->product = $product;
        return $this;


    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount(int $count): ShoppingCartItem
    {
        $this->count = $count;
        return $this;
    }


}