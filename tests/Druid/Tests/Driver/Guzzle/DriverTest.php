<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Tests\Driver\Guzzle;


use Druid\Driver\Guzzle\Connection;
use Druid\Driver\Guzzle\Driver;

class DriverTest extends \PHPUnit_Framework_TestCase
{

    public function testConnect()
    {
        $driver = new Driver();
        $connection = $driver->connect(['base_uri' => 'http://localhost']);
        $this->assertInstanceOf(Connection::class, $connection);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testFailureConnect()
    {
        $driver = new Driver();
        $driver->connect(['base_uri' => '']);
    }
}
