<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test;

use Druid\Druid;
use Druid\DruidClient;

/**
 * Class DruidTest
 *
 * @package Druid\Test
 * @covers  \Druid\Druid
 */
class DruidTest extends \PHPUnit_Framework_TestCase
{

    public function testGetClient()
    {
        $druid = new Druid([]);
        $client = $druid->getClient();
        $this->assertInstanceOf(DruidClient::class, $client);
    }
}
