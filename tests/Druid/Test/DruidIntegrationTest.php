<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test;

use Druid\Druid;
use Druid\Factory\DruiRequestFactory;
use Druid\Query\Entity\Aggregation\GroupBy;
use Druid\Query\Entity\Component\Aggregation\Aggregation;
use Druid\Query\Entity\Component\Aggregation\AggregationCollection;
use Druid\Query\Entity\Component\DataSource\DataSource;
use Druid\Query\Entity\Component\Granularity\Simple\DayGranularity;
use Druid\Query\Entity\Component\Interval\Interval;
use Druid\Query\Entity\Component\Interval\IntervalCollection;

/**
 * Class DruidIntegrationTest
 *
 * @package Druid\Test
 */
class DruidIntegrationTest extends \PHPUnit_Framework_TestCase
{

    public function testSendRequest()
    {
        $druid = new Druid(
            [
            'host' => '127.0.0.1',
            'port' => '8083',
            ]
        );
        
        $druid->getClient()->sendRequest($this->createRequest());
    }
    
    public function createRequest()
    {
        $query = new GroupBy();
        
        $query->setAggregations(new AggregationCollection([new Aggregation('count', 'rows', 'rows')]));
        $query->setDataSource(new DataSource('kpi_registrations_v1'));
        $query->setIntervals(new IntervalCollection([new Interval('2010-01-01T00:00', '2020-01-01T00:00')]));
        $query->setGranularity(new DayGranularity());



        $factory = new DruiRequestFactory;
        $request =  $factory->create($query);
        return $request;
    }
}
