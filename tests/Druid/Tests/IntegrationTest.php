<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Tests;

use Druid\Druid;
use Druid\Driver\Guzzle\Driver;
use Druid\Query\Aggregation\GroupBy;
use Druid\Query\Component\Aggregator\CountAggregator;
use Druid\Query\Component\Aggregator\DoubleSumAggregator;
use Druid\Query\Component\Aggregator\HyperUniqueAggregator;
use Druid\Query\Component\DataSource\TableDataSource;
use Druid\Query\Component\DimensionSpec\DefaultDimensionSpec;
use Druid\Query\Component\Granularity\PeriodGranularity;
use Druid\Query\Component\Interval\Interval;
use Druid\Query\Component\PostAggregator\ArithmeticPostAggregator;
use Druid\Query\Component\PostAggregator\FieldAccessPostAggregator;
use Druid\QueryBuilder\GroupByQueryBuilder;

class IntegrationTest extends \PHPUnit_Framework_TestCase
{

    public function testBasic()
    {
        $connection = new Druid(
            new Driver(),
            ['base_uri' => 'http://localhost:8084/druid/v2', 'proxy' => 'tcp://127.0.0.1:8080']
        );

        $queries = new GroupByQueryBuilder();
        $queries->setDataSource('kpi_registrations_v1');
        $queries->setGranularity('P1D', 'UTC');
        $queries->addInterval(new \DateTime('2000-01-01'), new \DateTime());
        

        $queries->addAggregator($queries->aggregator()->count('count_rows', 'event_count_metric'));
        $queries->addAggregator($queries->aggregator()->sum('sum_rows', 'event_count_metric'));
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

        $connection->send($queries->getQuery());
    }
}
