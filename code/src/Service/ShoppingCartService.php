<?php
/**
 * Created by PhpStorm.
 * User: kab
 * Date: 04.09.18
 * Time: 13:15
 */

namespace App\Service;


use App\Dto\ProductDto;
use App\Dto\ShoppingCartDto as ShoppingCartDto;
use App\Dto\ShoppingCartItemDto;
use App\Entity\Product;
use App\Entity\ShoppingCart;
use App\Entity\ShoppingCartItem;
use Doctrine\ORM\EntityManagerInterface;

class ShoppingCartService
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;


    /**
     * ShoppingCartService constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function initShoppingCart(): int
    {
        $cart = new ShoppingCart();
        $this->entityManager->persist($cart);
        $this->entityManager->flush();
        return $cart->getId();

    }


    public function addItemToCart(int $cartId, array $itemArray)
    {
        $cart = $this->entityManager->getRepository(ShoppingCart::class)->find(
            $cartId
        );

        $cartItem = new ShoppingCartItem();
        $cartItem->setShoppingCart($cart);
        $cartItem->setCount($itemArray['count']);
        $product = $this->entityManager->getRepository(Product::class)
            ->find($itemArray['product_id']);
        $cartItem->setProduct($product);
        $this->entityManager->persist($cartItem);
        $this->entityManager->flush();
        return $cartItem->getId();

    }


    public function getShoppingCart(int $cartId): ?ShoppingCartDto
    {
        $cartRepository = $this->entityManager->getRepository(
            ShoppingCart::class
        );
        /**
         * @var $shoppingCart ShoppingCart
         */
        $shoppingCart = $cartRepository->find($cartId);


        //create ShoppingCartDto
        $cartDto = new ShoppingCartDto();
        $cartDto->setId($shoppingCart->getId());


        $items = $shoppingCart->getShoppingCartItems();
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