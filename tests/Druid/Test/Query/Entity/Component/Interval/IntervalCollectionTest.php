<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test\Query\Entity\Component\Interval;

use Druid\Query\Common\Component\Interval\IntervalInterface;
use Druid\Query\Entity\Component\Interval\IntervalCollection;

/**
 * Class IntervalCollectionTest
 * @package Druid\Test\Query\Entity\Component\Interval
 * @covers \Druid\Query\Entity\Component\Interval\IntervalCollection
 */
class IntervalCollectionTest extends \PHPUnit_Framework_TestCase
{

    public function testSetGetIntervals()
    {
        $interval = $this->getMockBuilder(IntervalInterface::class)->setMethods(['getStart', 'getEnd'])->getMock();
        $collection = new IntervalCollection();
        $collection->setIntervals([$interval]);
        $this->assertEquals($collection->getIntervals()[0], $interval);
    }
}
