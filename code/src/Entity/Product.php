<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Created by PhpStorm.
 * User: Kifah Abbad
 * Date: 04.09.18
 * Time: 11:14
 */

/**
 * @ORM\Entity()
 */
class Product
{


    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    private $price;


    /**
     * One Shopping Cart has Many Items.
     * @ORM\OneToMany(targetEntity="App\Entity\ShoppingCartItem", mappedBy="product", fetch="EXTRA_LAZY")
     */
    private $shoppingCartItems;

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
    public function setId(int $id): Product
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getShoppingCartItems()
    {
        return $this->shoppingCartItems;
    }

    /**
     * @param mixed $shoppingCartItems
     */
    public function setShoppingCartItems($shoppingCartItems): Product
    {
        $this->shoppingCartItems = $shoppingCartItems;
        return $this;

    }




}