<?php
/**
 * Created by PhpStorm.
 * User: kab
 * Date: 04.09.18
 * Time: 15:02
 */

namespace App\Dto;


use App\Entity\Product;
use App\Entity\ShoppingCartItem;

class ShoppingCartItemDto implements \JsonSerializable
{


    /**
     * @var int
     */
    private $id;

    /**
     * @var ProductDto
     */
    private $product;

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
    public function setId(int $id): ShoppingCartItemDto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return ProductDto
     */
    public function getProduct(): ProductDto
    {
        return $this->product;
    }

    /**
     * @param ProductDto $product
     */
    public function setProduct(ProductDto $product): ShoppingCartItemDto
    {
        $this->product = $product;
        return $this;

    }


    public function jsonSerialize()
    {
        return [
            'product' => $this->getProduct(),
            'id'      => $this->getId()
        ];
    }
}