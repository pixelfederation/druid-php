<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test;

use Druid\DruidClient;
use Druid\DruidRequest;
use Druid\DruidResponse;
use Druid\HttpClient\Common\ClientInterface;

/**
 * Class DruidClientTest
 *
 * @package Druid\Test
 * @covers  \Druid\DruidClient
 */
class DruidClientTest extends \PHPUnit_Framework_TestCase
{
    public function testDestruct()
    {
        $mock = $this->getMockBuilder('Druid\HttpClient\Common\ClientInterface')
            ->setMethods(['closeConnection', 'send'])
            ->getMock();

        $mock->expects($this->once())
            ->method('closeConnection');

        $client = new DruidClient($mock);
        $client = null;
    }

    public function testGetHttpClient()
    {
        $mock = $this->getMockBuilder('Druid\HttpClient\Common\ClientInterface')
            ->setMethods(['closeConnection', 'send'])
            ->getMock();

        $client = new DruidClient($mock);
        $this->assertInstanceOf('Druid\HttpClient\Common\ClientInterface', $client->getHttpClient());
    }

    public function testSendRequest()
    {
        $mock = $this->getMockBuilder('Druid\HttpClient\Common\ClientInterface')
            ->setMethods(['closeConnection', 'send'])
            ->getMock();


        $client = new DruidClient($mock);

        $request = $this->getMockBuilder(DruidRequest::class)->disableOriginalConstructor()->getMock();
        $mock->expects($this->once())->method('send')->willReturn($this->getMock(DruidResponse::class));

        $response = $client->sendRequest($request);
        $this->assertInstanceOf(DruidResponse::class, $response);
    }
}
