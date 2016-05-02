<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test;

use Druid\Druid;
use Druid\DruidClient;
use Druid\DruidRequest;
use Druid\Query\Common\AggregationInterface;
use Druid\Query\Common\QueryInterface;
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

    public function testCreateRequest()
    {
        $druid = new Druid([]);

        $query = $this->getMock(QueryInterface::class);

        /** @var QueryInterface $query */
        $request = $druid->createRequest($query);

        $this->assertInstanceOf(DruidRequest::class, $request);
    }
}
