<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test\Query\Entity\Component\PostAggregation;

use Druid\Query\Common\Component\PostAggregation\PostAggregatorInterface;
use Druid\Query\Entity\Component\PostAggregation\PostAggregatorCollection;

/**
 * Class PostAggregatorCollectionTest
 * @package Druid\Test\Query\Entity\Component\PostAggregation
 * @covers \Druid\Query\Entity\Component\PostAggregation\PostAggregatorCollection
 */
class PostAggregatorCollectionTest extends \PHPUnit_Framework_TestCase
{


    public function testSetGetPostAggregations()
    {
        $aggregation = $this->getMockBuilder(PostAggregatorInterface::class)->setMethods([
            'getType',
            'getName',
        ])->getMock();

        $collection = new PostAggregatorCollection();
        $collection->setPostAggregations([$aggregation]);
        $this->assertEquals($collection->getPostAggregations()[0], $aggregation);
    }
}
