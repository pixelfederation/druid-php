<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test\HttpClient\Guzzle;

use Druid\Config\Config;
use Druid\DruidRequest;
use Druid\Factory\ResponseFactory;
use Druid\HttpClient\Guzzle\DruidGuzzleHttpClient;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

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

        $responseFactory = $this->getMockBuilder(ResponseFactory::class)->setMethods(['create'])->getMock();
        $responseFactory->expects($this->once())->method('create');

        $guzzle = $this
            ->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->setMethods(['post'])
            ->getMock();

        $guzzleResponse = $this
            ->getMockBuilder(Response::class)
            ->setMethods(
                ['getBody']
            )
            ->getMock();
        $guzzleResponse->expects($this->once())->method('getBody')->willReturn('[]');

        $guzzle->expects($this->once())->method('post')->willReturn($guzzleResponse);

        /** @var Config $config */
        /** @var ResponseFactory $responseFactory */
        $client = new DruidGuzzleHttpClient($config, $responseFactory, $guzzle);

        $request = $this
            ->getMockBuilder(DruidRequest::class)
            ->disableOriginalConstructor()
            ->setMethods(['toJson', 'getQueryType'])
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

        $response = $this->getMockBuilder(ResponseFactory::class)->setMethods(['create'])->getMock();
        $response->expects($this->once())->method('create');

        $guzzle = $this
            ->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->setMethods(['post'])
            ->getMock();

        $guzzleResponse = $this
            ->getMockBuilder(Response::class)
            ->setMethods(
                ['getBody']
            )
            ->getMock();

        $guzzleResponse->expects($this->once())->method('getBody')->willReturn('[]');

        $guzzle->expects($this->once())->method('post')->willReturn($guzzleResponse);

        /** @var Config $config */
        $client = new DruidGuzzleHttpClient($config, $response, $guzzle);

        $request = $this
            ->getMockBuilder(DruidRequest::class)
            ->disableOriginalConstructor()
            ->setMethods(['toJson', 'getQueryType'])
            ->getMock();

        $request->expects($this->once())->method('toJson');
        $request->expects($this->once())->method('getQueryType')->willReturn('groupBy');

        /** @var DruidRequest $request */
        $client->send($request);
    }

    public function testCloseConnection()
    {
        $config = $this->getMockBuilder(Config::class)->disableOriginalConstructor()->getMock();
        $response = $this->getMockBuilder(ResponseFactory::class)->disableOriginalConstructor()->getMock();
        $guzzle = $this->getMockBuilder(Client::class)->disableOriginalConstructor()->getMock();

        /** @var Config $config */
        $client = new DruidGuzzleHttpClient($config, $response, $guzzle);

        $this->assertEquals(null, $client->closeConnection());
    }

    /**
     * @covers \Druid\HttpClient\AbstractDruidClient::__construct
     * @covers \Druid\HttpClient\AbstractDruidClient::getConfig
     */
    public function testGetConfig()
    {
        $config = $this->getMockBuilder(Config::class)->disableOriginalConstructor()->getMock();
        $response = $this->getMockBuilder(ResponseFactory::class)->disableOriginalConstructor()->getMock();
        $guzzle = $this->getMockBuilder(Client::class)->disableOriginalConstructor()->getMock();

        /** @var Config $config */
        $client = new DruidGuzzleHttpClient($config, $response, $guzzle);

        $this->assertEquals($config, $client->getConfig());
    }
}
