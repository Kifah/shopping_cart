<?php
/**
 * Created by PhpStorm.
 * User: kab
 * Date: 04.09.18
 * Time: 13:15
 */

namespace App;


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


    public function createShoppingCartWithItems(array $payload): ?int
    {
        $productRepository = $this->entityManager->getRepository(
            Product::class
        );
        //persist the new cart and persist it
        $returnShoppingCart = new ShoppingCart();
        $this->entityManager->persist($returnShoppingCart);
        //create the cart items
        $carItemsArray = $payload['shopping_cart_items'];
        foreach ($carItemsArray as $item) {
            $itemToPersist = new ShoppingCartItem();
            $itemToPersist->setCount($item['count']);
            //get the product from its id
            $product = $productRepository->find($item['product_id']);
            $itemToPersist->setProduct($product);
            $itemToPersist->setShoppingCart($returnShoppingCart);
            $this->entityManager->persist($itemToPersist);
        }
        $this->entityManager->flush();
        return $returnShoppingCart->getId();
    }


    public function getShoppingCart(int $cartId): ?ShoppingCart
    {
        $cartRepository = $this->entityManager->getRepository(
            ShoppingCart::class
        );
        $shoppingCart = $cartRepository->find($cartId);
        return $shoppingCart;

    }
}