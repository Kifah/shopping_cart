<?php
/**
 * Created by PhpStorm.
 * User: kab
 * Date: 04.09.18
 * Time: 13:22
 */

namespace App\Service;


use App\Entity\ShoppingCart;
use App\Entity\ShoppingCartItem;
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

    /**
     * @var MockInterface|ShoppingCart
     */
    private $shoppingCart;

    /**
     * @var MockInterface|ShoppingCartItem
     */
    private $shoppingCartItem;

    public function setUp()
    {
        parent::setUp();
        $this->mockEntityManager = \Mockery::mock(
            EntityManagerInterface::class
        );

        $this->shoppingCart = \Mockery::mock(ShoppingCart::class);
        $this->shoppingCartItem = \Mockery::mock(ShoppingCartItem::class);
        $this->testObject = new ShoppingCartService(
            $this->mockEntityManager, $this->shoppingCart,
            $this->shoppingCartItem
        );
    }

    /**
     * @test
     */
    public function initShoppingCartWithItemsWorks()
    {
        $expected = 1;
        $this->mockEntityManager->shouldReceive('persist')->with(
            $this->shoppingCart
        )->once();
        $this->mockEntityManager->shouldReceive('flush')->once();
        $this->shoppingCart->shouldReceive('getId')->once()->andReturn(
            $expected
        );
        $createdShoppingCartId = $this->testObject->initShoppingCart();
        $this->assertEquals(1, $createdShoppingCartId);

    }
}
