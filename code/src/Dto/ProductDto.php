<?php
/**
 * Created by PhpStorm.
 * User: kab
 * Date: 04.09.18
 * Time: 15:04
 */

namespace App\Dto;


class ProductDto implements \JsonSerializable
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

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
    public function setId(int $id): ProductDto
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
    public function setName(string $name): ProductDto
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
    public function setPrice(float $price): ProductDto
    {
        $this->price = $price;
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'price' => $this->getPrice(),
            'id'    => $this->getId(),
            'name'  => $this->getName()
        ];
    }


}