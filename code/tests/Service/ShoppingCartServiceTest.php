<?php
/**
 * Created by PhpStorm.
 * User: kab
 * Date: 04.09.18
 * Time: 13:22
 */

namespace App;


use Doctrine\ORM\EntityManagerInterface;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class ShoppingCartServiceTest extends TestCase
{

    /**
     * @var ShoppingCartService
     */
    private $testObject;

    /**
     * @var MockInterface|EntityManagerInterface
     */
    private $mockEntityManager;

    public function setUp()
    {
        parent::setUp();
        $this->mockEntityManager = \Mockery::mock(
            EntityManagerInterface::class
        );
        $this->testObject = new ShoppingCartService($this->mockEntityManager);
    }

    public function testCreateShoppingCartWithItems()
    {
        $payload = ['shopping_cart_items' => ['product_id' => 1,
                                              'amount'     => 2]];

        $createdShoppingCart = $this->testObject->createShoppingCartWithItems(
            $payload
        );
        //$this->assertTrue(true);

    }
}
