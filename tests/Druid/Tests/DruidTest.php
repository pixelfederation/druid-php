<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Tests;

use Druid\Druid;
use Druid\Driver\DriverConnectionInterface;
use Druid\Driver\DriverInterface;
use Druid\Query\QueryInterface;

/**
 * Class DruidTest
 * @package Druid\Tests
 */
class DruidTest extends \PHPUnit_Framework_TestCase
{
    public function testRun()
    {
        $driverMock = $this->getMockBuilder(DriverInterface::class)->setMethods(['connect'])->getMock();

        $driverConnectionMock = $this->getMockBuilder(DriverConnectionInterface::class)
            ->setMethods(['send'])
            ->getMock();

        $driverConnectionMock->expects($this->once())->method('send')->willReturn(true);

        $driverMock->expects($this->once())->method('connect')
            ->with(['base_uri' => 'http://localhost'])
            ->willReturn($driverConnectionMock);

        $connection = new Druid($driverMock, ['base_uri' => 'http://localhost']);

        $queryMock = $this->getMock(QueryInterface::class);
        $result = $connection->send($queryMock);
        $this->assertTrue($result);
    }
}
