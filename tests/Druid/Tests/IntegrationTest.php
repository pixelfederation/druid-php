<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Tests;


use Druid\Connection;
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
        $connection = new Connection(new Driver(),
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

        $query = new GroupBy();
        $query->setDataSource(new TableDataSource('kpi_registrations_v1'));
        $query->setGranularity(new PeriodGranularity('P1D', 'UTC'));
        $query->setIntervals([new Interval(new \DateTime('2000-01-01'), new \DateTime())]);
        $query->setAggregations([
            new CountAggregator('count_rows', 'event_count_metric'),
            new DoubleSumAggregator('sum_rows', 'event_count_metric'),
            new HyperUniqueAggregator('registrations', 'registrations')
        ]);

        $query->setDimensions([
            new DefaultDimensionSpec('project', 'project')
        ]);

        $query->setPostAggregations([
            new ArithmeticPostAggregator('average', '/', [
                new FieldAccessPostAggregator('sum_rows', 'sum_rows'),
                new FieldAccessPostAggregator('count_rows', 'count_rows')
            ])
        ]);

        $this->assertEquals($query, $queries->getQuery());

        $connection->send($queries->getQuery());
    }
}