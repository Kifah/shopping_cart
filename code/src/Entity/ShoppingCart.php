<?php
/**
 * Created by PhpStorm.
 * User: kab
 * Date: 04.09.18
 * Time: 11:39
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity()
 */
class ShoppingCart
{


    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * One Shopping Cart has Many Items.
     * @ORM\OneToMany(targetEntity="ShoppingCartItem", mappedBy="shoppingCart")
     */
    private $shoppingCartItems;

    // ...

    public function __construct()
    {
        $this->shoppingCartItems = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): ShoppingCart
    {
        $this->id = $id;
        return $this;
    }


    public function getShoppingCartItems()
    {
        return $this->shoppingCartItems;
    }


    public function setShoppingCartItems($shoppingCartItems): ShoppingCart
    {
        $this->shoppingCartItems = $shoppingCartItems;
        return $this;
    }


}