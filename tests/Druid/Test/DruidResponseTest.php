<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test;

use Druid\Common\RecordFactoryInterface;
use Druid\DruidResponse;
use Druid\Response\Record;
use Druid\Response\RecordResult;

/**
 * Class DruidResponseTest
 * @package Druid\Test
 * @covers \Druid\DruidResponse
 */
class DruidResponseTest extends \PHPUnit_Framework_TestCase
{

    public function testIsIterable()
    {
        $factory = $this->getMockBuilder(RecordFactoryInterface::class)->setMethods(['create'])->getMock();

        $record = new Record((new \DateTime())->format(\DateTime::ISO8601), new RecordResult([]));
        $factory->expects($this->once())->method('create')->willReturn($record);

        /** @var RecordFactoryInterface $factory */
        $response = new DruidResponse(
            [
                [
                    'timestamp' => (new \DateTime())->format(\DateTime::ISO8601),
                    'event' => []
                ]
            ],
            $factory
        );

        foreach ($response as $key => $generatedRecord) {
            $this->assertEquals($record, $generatedRecord);
            $this->assertEquals(0, $key);
        }
    }
}
