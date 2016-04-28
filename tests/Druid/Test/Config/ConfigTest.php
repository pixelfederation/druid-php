<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test\Config;

use Druid\Config\Config;

/**
 * Class ConfigTest
 * @package Druid\Test\Config
 * @covers \Druid\Config\Config
 */
class ConfigTest extends \PHPUnit_Framework_TestCase
{
    public function testDefaultToString()
    {
        $config = new Config([]);
        $setup = $config->__toString();

        $expected = sprintf(
            '%s://%s:%d/%s/%s',
            Config::DEFAULT_PROTOCOL,
            Config::DEFAULT_HOST,
            Config::DEFAULT_PORT,
            Config::DEFAULT_PATH,
            Config::DEFAULT_API_VERSION
        );

        $this->assertEquals($expected, $setup);
    }

    public function testCustomToString()
    {
        $config = new Config([
            'protocol' => 'https',
            'host' => '127.0.0.1',
            'port' => 9999,
            'path' => 'path',
            'api_version' => 'v123',
        ]);
        $setup = $config->__toString();

        $expected = sprintf(
            '%s://%s:%d/%s/%s',
            'https',
            '127.0.0.1',
            9999,
            'path',
            'v123'
        );

        $this->assertEquals($expected, $setup);
    }
}
