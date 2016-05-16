<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Tests;

use Druid\Driver\ResponseInterface;
use Druid\Druid;
use Druid\Driver\Guzzle\Driver;
use Druid\QueryBuilder\GroupByQueryBuilder;

class IntegrationTest extends \PHPUnit_Framework_TestCase
{

    public function testBasic()
    {
        $connection = new Druid(
            new Driver(),
            [
                'proxy' => 'tcp://127.0.0.1:8080'
            ]
        );

        $queries = new GroupByQueryBuilder();
        $queries->setDataSource('kpi_registrations_v1');
        $queries->setGranularity('P1D', 'UTC');
        $queries->addInterval(new \DateTime('2000-01-01'), new \DateTime());


        $queries->addAggregator($queries->aggregator()->count('count_rows'));
        $queries->addAggregator($queries->aggregator()->doubleSum('sum_rows', 'event_count_metric'));
        $queries->addAggregator($queries->aggregator()->hyperUnique('registrations', 'registrations'));

        $queries->addDimension('project', 'project');

        $queries->addPostAggregator(
            $queries->postAggregator()->arithmeticPostAggregator(
                'average',
                '/',
                [
                    $queries->postAggregator()->fieldAccessPostAggregator('sum_rows', 'sum_rows'),
                    $queries->postAggregator()->fieldAccessPostAggregator('count_rows', 'count_rows')
                ]
            )
        );

        $response = $connection->send($queries->getQuery());
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}
