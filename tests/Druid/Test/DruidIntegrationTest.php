<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test;

use Druid\Druid;
use Druid\DruidRequest;
use Druid\Factory\DruidRequestFactory;
use Druid\Query\Entity\Aggregation\GroupBy;
use Druid\Query\Entity\Component\Aggregation;
use Druid\Query\Entity\Component\DataSource\DataSource;
use Druid\Query\Entity\Component\DimensionSpec\DimensionSpec;
use Druid\Query\Entity\Component\DimensionSpec\DimensionSpecCollection;
use Druid\Query\Entity\Component\Filter\SelectorFilter;
use Druid\Query\Entity\Component\Granularity\Simple\DayGranularity;
use Druid\Query\Entity\Component\Interval\Interval;
use Druid\Query\Entity\Component\Interval\IntervalCollection;
use Druid\Query\Entity\Component\PostAggregation\ArithmeticPostAggregator;
use Druid\Query\Entity\Component\PostAggregation\ConstantPostAggregator;
use Druid\Query\Entity\Component\PostAggregation\FieldAccessPostAggregator;
use Druid\Query\Entity\Component\PostAggregation\PostAggregatorCollection;

/**
 * Class DruidIntegrationTest
 *
 * @package Druid\Test
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
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

        $druid->getClient()->sendRequest($request);
    }

    public function requestProvider()
    {
        return [
//            'basic' => [$this->createBasicRequest()],
//            'advance' => [$this->createAdvanceRequest()],
            'hard' => [$this->createHardRequest()],
        ];
    }

    public function createBasicRequest()
    {
        $query = new GroupBy();

        $query->setAggregations(
            new Aggregation\AggregationCollection(
                [new Aggregation\StandardAggregator('count', 'rows', 'rows')]
            )
        );

        $query->setDataSource(new DataSource('kpi_registrations_v1'));
        $query->setIntervals(new IntervalCollection([new Interval('2010-01-01T00:00', '2020-01-01T00:00')]));
        $query->setGranularity(new DayGranularity());


        $factory = new DruidRequestFactory;
        $request = $factory->create($query);
        return $request;
    }

    public function createAdvanceRequest()
    {
        $query = new GroupBy();

        $query->setAggregations(
            new Aggregation\AggregationCollection(
                [
                    new Aggregation\StandardAggregator('hyperUnique', 'registrations', 'registrations'),
                    new Aggregation\StandardAggregator('doubleSum', 'count', 'event_count_metric')
                ]
            )
        );

        $query->setDimensions(
            new DimensionSpecCollection(
                [new DimensionSpec('project')]
            )
        );
        $query->setDataSource(new DataSource('mkt_registrations_v1'));
        $query->setIntervals(
            new IntervalCollection([new Interval('2016-04-19T00:00:00+0200', '2016-04-20T00:00:00+0200')])
        );
        $query->setGranularity(new DayGranularity());


        $factory = new DruidRequestFactory;
        $request = $factory->create($query);

        return $request;
    }

    public function createHardRequest()
    {
        $query = new GroupBy();

        $query->setAggregations(
            new Aggregation\AggregationCollection(
                [
                    new Aggregation\FilteredAggregation(
                        new SelectorFilter('rN', 1),
                        new Aggregation\StandardAggregator('doubleSum', 'r1', 'players')
                    ),
                    new Aggregation\FilteredAggregation(
                        new SelectorFilter('rN', 0),
                        new Aggregation\StandardAggregator('doubleSum', 'r0', 'players')
                    ),
                    new Aggregation\FilteredAggregation(
                        new SelectorFilter('rN', 3),
                        new Aggregation\StandardAggregator('doubleSum', 'r3', 'players')
                    ),
                    new Aggregation\FilteredAggregation(
                        new SelectorFilter('rN', 84),
                        new Aggregation\StandardAggregator('doubleSum', 'r84', 'players')
                    ),
                    new Aggregation\FilteredAggregation(
                        new SelectorFilter('rN', 7),
                        new Aggregation\StandardAggregator('doubleSum', 'r7', 'players')
                    ),
                ]
            )
        );

        $query->setDataSource(new DataSource('retention_rt_v1'));
        $query->setGranularity(new DayGranularity());
        $query->setIntervals(
            new IntervalCollection([new Interval('2015-01-01', '2017-01-01')])
        );


        $retention1 = new ArithmeticPostAggregator(
            'retention_1',
            '/',
            new PostAggregatorCollection(
                [
                    new ArithmeticPostAggregator(
                        'r1divr0',
                        '/',
                        new PostAggregatorCollection(
                            [
                                new FieldAccessPostAggregator('r1', 'r1'),
                                new FieldAccessPostAggregator('r0', 'r0')
                            ]
                        )
                    ),
                    new ConstantPostAggregator('const', 100)
                ]
            )
        );

        $query->setPostAggregations(
            new PostAggregatorCollection(
                [
                    $retention1
                ]
            )
        );


        $factory = new DruidRequestFactory;
        $request = $factory->create($query);

//        echo ($request->toJson());exit;

        return $request;

    }
}
