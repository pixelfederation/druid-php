<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test\HttpClient\Guzzle;

use Druid\Config\Config;
use Druid\DruidRequest;
use Druid\HttpClient\Guzzle\DruidGuzzleHttpClient;
use GuzzleHttp\Client;

/**
 * Class DruidGuzzleHttpClientTest
 * @package Druid\Test\HttpClient\Guzzle
 * @covers \Druid\HttpClient\Guzzle\DruidGuzzleHttpClient
 */
class DruidGuzzleHttpClientTest extends \PHPUnit_Framework_TestCase
{


    public function testNoProxySend()
    {
        $config = $this->getMockBuilder(Config::class)->disableOriginalConstructor()->getMock();
        $guzzle = $this
            ->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->setMethods(['post'])
            ->getMock();

        $guzzle->expects($this->once())->method('post');

        /** @var Config $config */
        $client = new DruidGuzzleHttpClient($config, $guzzle);

        $request = $this
            ->getMockBuilder(DruidRequest::class)
            ->disableOriginalConstructor()
            ->setMethods(['toJson'])
            ->getMock();

        $request->expects($this->once())->method('toJson');


        /** @var DruidRequest $request */
        $client->send($request);
    }

    public function testProxySend()
    {
        $config = $this
            ->getMockBuilder(Config::class)
            ->disableOriginalConstructor()
            ->setMethods(['getProxy'])
            ->getMock();
        
        $config->expects($this->once())->method('getProxy')->willReturn('tcp://127.0.0.1:8080');

        $guzzle = $this
            ->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->setMethods(['post'])
            ->getMock();

        $guzzle->expects($this->once())->method('post');

        /** @var Config $config */
        $client = new DruidGuzzleHttpClient($config, $guzzle);

        $request = $this
            ->getMockBuilder(DruidRequest::class)
            ->disableOriginalConstructor()
            ->setMethods(['toJson'])
            ->getMock();

        $request->expects($this->once())->method('toJson');


        /** @var DruidRequest $request */
        $client->send($request);
    }

    public function testCloseConnection()
    {
        $config = $this->getMockBuilder(Config::class)->disableOriginalConstructor()->getMock();
        $guzzle = $this->getMockBuilder(Client::class)->disableOriginalConstructor()->getMock();

        /** @var Config $config */
        $client = new DruidGuzzleHttpClient($config, $guzzle);

        $this->assertEquals(null, $client->closeConnection());
    }
}
