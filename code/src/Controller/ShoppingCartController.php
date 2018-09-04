<?php
/**
 * Created by PhpStorm.
 * User: kab
 * Date: 04.09.18
 * Time: 13:40
 */


namespace App\Controller;

use App\Dto\ShoppingCartDto;
use App\Service\ShoppingCartService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class ShoppingCartController
 *
 * @package App\Controller
 * @Route("/api")
 */
class ShoppingCartController
{
    /**
     * @var ShoppingCartService
     */
    private $cartService;

    /**
     * ShoppingCartController constructor.
     */
    public function __construct(ShoppingCartService $cartService)
    {
        $this->cartService = $cartService;
    }


    /**
     * @Route("/shopping_cart", name="create_shopping_cart", methods={"POST"})
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function initCartAction(Request $request)
    {
        $createdCartId = $this->cartService->initShoppingCart();

        return new JsonResponse($createdCartId, 201);
    }

    /**
     * @Route("/shopping_cart/{id}/item", name="add_cart_item", methods={"POST"})
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function addItemToCartAction(int $id, Request $request)
    {
        $payload = json_decode($request->getContent(), true);
        $createdCartId = $this->cartService->addItemToCart($id, $payload);

        return new JsonResponse($createdCartId, 201);
    }


    /**
     * @Route("/shopping_cart/{id}", name="get_shopping_cart", methods={"GET"})
     * @param int $id
     *
     * @return JsonResponse
     */
    public function getCartAction(int $id)
    {
        $shoppingCart = $this->cartService->getShoppingCart($id);

        return new JsonResponse($shoppingCart, 200);
    }
}