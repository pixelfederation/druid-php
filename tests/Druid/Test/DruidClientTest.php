<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test;

use Druid\DruidClient;
use Druid\HttpClient\Common\ClientInterface;

/**
 * Class DruidClientTest
 * @package Druid\Test
 * @coversDefaultClass \Druid\DruidClient
 */
class DruidClientTest extends \PHPUnit_Framework_TestCase
{
    public function testDestruct()
    {
        /** @var ClientInterface $mock */

        $mock = $this->getMockBuilder('Druid\HttpClient\Common\ClientInterface')
            ->setMethods(['closeConnection', 'send'])
            ->getMock();

        $mock->expects($this->once())
            ->method('closeConnection');

        new DruidClient($mock);
    }

    /**
     * @covers \Druid\DruidClient::getHttpClient
     */
    public function testGetHttpClient()
    {
        $mock = $this->getMockBuilder('Druid\HttpClient\Common\ClientInterface')
            ->setMethods(['closeConnection', 'send'])
            ->getMock();

        $client = new DruidClient($mock);
        $this->assertInstanceOf('Druid\HttpClient\Common\ClientInterface', $client->getHttpClient());
    }
}
