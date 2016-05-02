<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test\Factory;

use Druid\DruidResponse;
use Druid\Factory\ResponseFactory;

/**
 * Class ResponseFactoryTest
 * @package Druid\Test\Factory
 * @covers \Druid\Factory\ResponseFactory
 */
class ResponseFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $factory = new ResponseFactory();
        $response = $factory->create([], ResponseFactory::GROUP_BY_TYPE);
        $this->assertInstanceOf(DruidResponse::class, $response);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testCreateException()
    {
        $factory = new ResponseFactory();
        $factory->create([], 'non_existing_type');
    }
}
