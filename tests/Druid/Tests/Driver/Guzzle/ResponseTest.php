<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Tests\Driver\Guzzle;

use Druid\Driver\Guzzle\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{

    public function testGetRecords()
    {
        $originalResponseMock = $this->getMockBuilder(\GuzzleHttp\Psr7\Response::class)->setMethods(
            ['getBody']
        )->getMock();
        
        $originalResponseMock->expects($this->once())->method('getBody')->willReturn(
            '[{"timestamp":"2016-06-06T00:00:00.000Z", "event":{"event_row":5}, "result":{"result_row":5}}]'
        );


        $response = new Response($originalResponseMock);

        $records = $response->getRecords();
        $this->assertTrue(\is_array($records));
        $this->assertArrayHasKey('event_row', $records[0]);
        $this->assertArrayHasKey('result_row', $records[0]);
    }
}
