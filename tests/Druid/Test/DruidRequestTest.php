<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test;

use Druid\DruidRequest;
use Druid\Query\Common\QueryInterface;
use JMS\Serializer\Serializer;

/**
 * Class DruidRequestTest
 * @package Druid\Test
 * @covers \Druid\DruidRequest
 */
class DruidRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testToJson()
    {
        $query = $this->getMock(QueryInterface::class);
        $serializer = $this->getMockBuilder(Serializer::class)->disableOriginalConstructor()->getMock();
        $serializer->expects($this->once())->method('serialize')
            ->with($query, 'json');

        $request = new DruidRequest($query, $serializer);
        $request->toJson();
    }

    public function testGetQuery()
    {
        $query = $this->getMock(QueryInterface::class);
        $serializer = $this->getMockBuilder(Serializer::class)->disableOriginalConstructor()->getMock();

        $request = new DruidRequest($query, $serializer);
        $this->assertSame($query, $request->getQuery());
    }

    public function testGetQueryType()
    {
        $query = $this->getMock(QueryInterface::class);
        $query->expects($this->once())->method('getQueryType')->willReturn('groupBy');

        $serializer = $this->getMockBuilder(Serializer::class)->disableOriginalConstructor()->getMock();

        $request = new DruidRequest($query, $serializer);
        $this->assertSame('groupBy', $request->getQueryType());
    }
}
