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
     * @var ShoppingCart
     */
    private $shoppingCart;
    /**
     * @var ShoppingCartItem
     */
    private $shoppingCartItem;


    /**
     * ShoppingCartService constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param ShoppingCart           $shoppingCart
     * @param ShoppingCartItem       $shoppingCartItem
     */
    public function __construct(EntityManagerInterface $entityManager,
        ShoppingCart $shoppingCart, ShoppingCartItem $shoppingCartItem
    ) {
        $this->entityManager = $entityManager;
        $this->shoppingCart = $shoppingCart;
        $this->shoppingCartItem = $shoppingCartItem;
    }


    public function initShoppingCart(): int
    {
        $cart = $this->shoppingCart;
        $this->entityManager->persist($cart);
        $this->entityManager->flush();
        return $cart->getId();

    }


    public function addItemToCart(int $cartId, array $itemArray)
    {
        $cart = $this->entityManager->getRepository(ShoppingCart::class)->find(
            $cartId
        );

        $cartItem = $this->shoppingCartItem;
        $cartItem->setShoppingCart($cart);
        $cartItem->setCount($itemArray['count']);
        $product = $this->entityManager->getRepository(Product::class)
            ->find($itemArray['product_id']);
        $cartItem->setProduct($product);
        $this->entityManager->persist($cartItem);
        $this->entityManager->flush();
        return $cartItem->getId();

    }

    public function deleteItemFromCart(int $itemId): bool
    {
        $deleted = false;
        $item = $this->entityManager->getRepository(ShoppingCartItem::class)
            ->find(
                $itemId
            );
        if (!$item) {
            throw new \Exception(
                'No cart item found'
            );
        } else {

            $this->entityManager->remove($item);
            $this->entityManager->flush();
            $deleted = true;
        }

        return $deleted;


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

        return $shoppingCart->transformEntityToDto();


    }
}