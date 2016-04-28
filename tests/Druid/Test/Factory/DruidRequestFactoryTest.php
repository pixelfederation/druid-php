<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test\Factory;

use Druid\DruidRequest;
use Druid\Factory\DruidRequestFactory;
use Druid\Query\Common\QueryInterface;

/**
 * Class DruidRequestFactoryTest
 * @package Druid\Test\Factory
 * @covers Druid\Factory\DruidRequestFactory
 */
class DruidRequestFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $factory = new DruidRequestFactory();

        $query = $this->getMock(QueryInterface::class);
        $request = $factory->create($query);
        $this->assertInstanceOf(DruidRequest::class, $request);
    }
}
