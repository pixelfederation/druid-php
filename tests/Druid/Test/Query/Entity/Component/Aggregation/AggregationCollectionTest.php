<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test\Query\Entity\Component\Aggregation;

use Druid\Query\Common\Component\Aggregation\AggregationInterface;
use Druid\Query\Entity\Component\Aggregation\AggregationCollection;

/**
 * Class AggregationCollectionTest
 * @package Druid\Test\Query\Entity\Component\Aggregation
  * @covers \Druid\Query\Entity\Component\Aggregation\AggregationCollection
 */
class AggregationCollectionTest extends \PHPUnit_Framework_TestCase
{

    public function testSetGetAggregations()
    {
        $collection = new AggregationCollection();
        $aggregation = $this->getMockBuilder(AggregationInterface::class)->setMethods([
            'getType',
            'getName',
            'getFieldName'
        ])->getMock();

        $collection->setAggregations([$aggregation]);
        $this->assertEquals($collection->getAggregations()[0], $aggregation);
    }
}
