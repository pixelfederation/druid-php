<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test\HttpClient\Factory;

use Druid\HttpClient\Factory\DruidHttpClientFactory;
use Druid\HttpClient\Guzzle\DruidGuzzleHttpClient;

/**
 * Class DruidHttpClientFactoryTest
 *
 * @package Druid\Test\HttpClient\Factory
 * @covers  \Druid\HttpClient\Factory\DruidHttpClientFactory
 */
class DruidHttpClientFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testGetDruidHttpClient()
    {
        $factory = new DruidHttpClientFactory([]);

        $client = $factory->getDruidHttpClient();
        $this->assertInstanceOf(DruidGuzzleHttpClient::class, $client);
    }
}
