<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test;

use Druid\Druid;
use Druid\DruidRequest;
use Druid\DruidResponse;
use Druid\Factory\DruidRequestFactory;
use Druid\Query\Entity\Component\Aggregation;
use Druid\QueryBuilder\GroupByQueryBuilder;

/**
 * Class DruidIntegrationTest
 *
 * @package Druid\Test
 */
class DruidIntegrationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param DruidRequest $request
     * @dataProvider requestProvider
     */
    public function testSendRequest(DruidRequest $request)
    {
        $druid = new Druid(
            [
                'host' => '127.0.0.1',
                'port' => '8083',
                'proxy' => 'tcp://127.0.0.1:8080'
            ]
        );

        $response = $druid->getClient()->sendRequest($request);
        $this->assertInstanceOf(DruidResponse::class, $response);
    }

    public function requestProvider()
    {
        return [
            'basic' => [$this->createBasicRequest()],
            'advance' => [$this->createAdvanceRequest()],
            'hard' => [$this->createHardRequest()],
        ];
    }

    public function createBasicRequest()
    {
        $queryBuilder = new GroupByQueryBuilder();
        $query = $queryBuilder
            ->addAggregator($queryBuilder->expr()->standardAggregator('count', 'rows', 'rows'))
            ->setDataSource('kpi_registrations_v1')
            ->addInterval('2010-01-01T00:00', '2020-01-01T00:00')
            ->setGranularity($queryBuilder->expr()->dayGranularity())
            ->getQuery();

        $factory = new DruidRequestFactory;
        $request = $factory->create($query);
        return $request;
    }

    public function createAdvanceRequest()
    {
        $queryBuilder = new GroupByQueryBuilder();
        $query = $queryBuilder
            ->addAggregator($queryBuilder->expr()->standardAggregator('hyperUnique', 'registrations', 'registrations'))
            ->addAggregator($queryBuilder->expr()->standardAggregator('doubleSum', 'count', 'event_count_metric'))
            ->setDataSource('mkt_registrations_v1')
            ->addDimension('project')
            ->addInterval('2016-04-19T00:00:00+0200', '2016-04-20T00:00:00+0200')
            ->setGranularity($queryBuilder->expr()->dayGranularity())
            ->getQuery();

        $factory = new DruidRequestFactory;
        $request = $factory->create($query);

        return $request;
    }

    public function createHardRequest()
    {

        $queryBuilder = new GroupByQueryBuilder();
        $query = $queryBuilder
            ->addAggregator($queryBuilder->expr()->filteredAggregator(['rN', 1], ['doubleSum', 'r1', 'players']))
            ->addAggregator($queryBuilder->expr()->filteredAggregator(['rN', 0], ['doubleSum', 'r0', 'players']))
            ->addAggregator($queryBuilder->expr()->filteredAggregator(['rN', 3], ['doubleSum', 'r3', 'players']))
            ->addAggregator($queryBuilder->expr()->filteredAggregator(['rN', 84], ['doubleSum', 'r84', 'players']))
            ->addAggregator($queryBuilder->expr()->filteredAggregator(['rN', 7], ['doubleSum', 'r7', 'players']))
            ->setDataSource('retention_rt_v1')
            ->setGranularity($queryBuilder->expr()->dayGranularity())
            ->addDimension('project')
            ->addInterval('2015-01-01', '2017-01-01')
            ->addPostAggregator($queryBuilder->expr()->arithmeticPostAggregator('retention_1', '/', [
                $queryBuilder->expr()->arithmeticPostAggregator('r1divr0', '/', [
                    $queryBuilder->expr()->fieldAccessPostAggregator('r1', 'r1'),
                    $queryBuilder->expr()->fieldAccessPostAggregator('r0', 'r0'),
                ]),
                $queryBuilder->expr()->constantPostAggregator('const', 100)
            ]))
            ->getQuery();

        $factory = new DruidRequestFactory;
        $request = $factory->create($query);

        return $request;
    }
}
