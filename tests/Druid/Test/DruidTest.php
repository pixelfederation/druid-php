<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test;

use Druid\Druid;
use Druid\DruidClient;
use Druid\Query\Common\AggregationInterface;
use Druid\QueryBuilder\GroupByQueryBuilder;

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

    public function testCreateQueryBuilder()
    {
        $druid = new Druid([]);
        $queryBuilder = $druid->createQueryBuilder(AggregationInterface::GROUP_BY_TYPE);
        $this->assertInstanceOf(GroupByQueryBuilder::class, $queryBuilder);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testCreateQueryBuilderException()
    {
        $druid = new Druid([]);
        $druid->createQueryBuilder('non_existing_type');
    }
}
