<?php
/**
 * Created by PhpStorm.
 * User: kab
 * Date: 04.09.18
 * Time: 11:39
 */

namespace App\Entity;

use App\Dto\ProductDto;
use App\Dto\ShoppingCartDto;
use App\Dto\ShoppingCartItemDto;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity()
 */
class ShoppingCart implements transformInterface
{


    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @var ArrayCollection
     * One Shopping Cart has Many Items.
     * @ORM\OneToMany(targetEntity="App\Entity\ShoppingCartItem", mappedBy="shoppingCart", fetch="EXTRA_LAZY")
     */
    private $shoppingCartItems;


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

    public function addShoppingCartItem(ShoppingCartItem $cartItem)
    {
        $this->shoppingCartItems->add($cartItem);
    }

    /**
     * responsible for transformaing an entity to a data transfer object
     */
    public function transformEntityToDto()
    {
        //create ShoppingCartDto
        $cartDto = new ShoppingCartDto();
        $cartDto->setId($this->getId());


        $items = $this->getShoppingCartItems();
        /**
         * @var $item ShoppingCartItem
         */
        foreach ($items as $item) {
            $itemDto = new ShoppingCartItemDto();
            $itemDto->setId($item->getId());
            $productDto = new ProductDto();
            $productDto->setId($item->getProduct()->getId());
            $productDto->setPrice($item->getProduct()->getPrice());
            $productDto->setName($item->getProduct()->getName());
            $itemDto->setProduct($productDto);
            $cartDto->addShoppingCartItem(
                $itemDto
            );

        }

        return $cartDto;
    }
}