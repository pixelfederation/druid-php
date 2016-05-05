<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test\Query\Entity\Component\Factory;

use Druid\Query\Common\Component\Factory\ComponentFactoryInterface;
use Druid\Query\Entity\Component\Factory\ComponentFactoryManager;

/**
 * Class ComponentFactoryManagerTest
 * @package Druid\Test\Query\Entity\Component\Factory
 * @covers \Druid\Query\Entity\Component\Factory\ComponentFactoryManager
 */
class ComponentFactoryManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testSetFactories()
    {
        $componentFactory = $this->getMockBuilder(ComponentFactoryInterface::class)->setMethods([
            'getType',
            'create'
        ])->getMock();

        $componentFactory->expects($this->once())->method('getType');

        $factories = [$componentFactory];
        $factory = new ComponentFactoryManager();
        $factory->setFactories($factories);
    }

    public function testGetFactory()
    {
        $componentFactory = $this->getMockBuilder(ComponentFactoryInterface::class)->setMethods([
            'getType',
            'create'
        ])->getMock();

        $componentFactory->expects($this->once())->method('getType')->willReturn('typed');

        $factories = [$componentFactory];
        $factory = new ComponentFactoryManager($factories);
        $typedFactory = $factory->getFactory('typed');
        $this->assertInstanceOf(ComponentFactoryInterface::class, $typedFactory);
    }
}
