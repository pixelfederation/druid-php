<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test\Query\Entity\Component\DimensionSpec;

use Druid\Query\Common\Component\DimensionSpec\DimensionSpecInterface;
use Druid\Query\Entity\Component\DimensionSpec\DimensionSpecCollection;

/**
 * Class DimensionSpecCollectionTest
 * @package Druid\Test\Query\Entity\Component\DimensionSpec
 * @covers \Druid\Query\Entity\Component\DimensionSpec\DimensionSpecCollection
 */
class DimensionSpecCollectionTest extends \PHPUnit_Framework_TestCase
{

    public function testSetGetDimensions()
    {
        $dimension = $this->getMockBuilder(DimensionSpecInterface::class)->setMethods([
            'getType',
            'getDimension',
            'getOutputName'
        ])->getMock();

        $collection = new DimensionSpecCollection();
        $collection->setDimensions([$dimension]);
        $this->assertEquals($collection->getDimensions()[0], $dimension);
    }
}
