<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Tests\Query\Component\Factory;

use Druid\Query\Component\Aggregator\CountAggregator;
use Druid\Query\Component\Aggregator\DoubleSumAggregator;
use Druid\Query\Component\Aggregator\FilteredAggregator;
use Druid\Query\Component\Aggregator\HyperUniqueAggregator;
use Druid\Query\Component\Aggregator\LongSumAggregator;
use Druid\Query\Component\AggregatorInterface;
use Druid\Query\Component\Factory\AggregatorFactory;
use Druid\Query\Component\FilterInterface;

class AggregatorFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider arithmeticData
     */
    public function testArithmeticAggregator($type, $name, $fieldName, $expected)
    {
        $factory = new AggregatorFactory();
        $aggregator = $factory->arithmeticAggregator($type, $name, $fieldName);
        $this->assertInstanceOf($expected, $aggregator);

    }

    public function arithmeticData()
    {
        return [
            [AggregatorInterface::TYPE_COUNT, 'name', 'fieldName', CountAggregator::class],
            [AggregatorInterface::TYPE_DOUBLE_SUM, 'name', 'fieldName', DoubleSumAggregator::class],
            [AggregatorInterface::TYPE_HYPER_UNIQUE, 'name', 'fieldName', HyperUniqueAggregator::class],
            [AggregatorInterface::TYPE_LONG_SUM, 'name', 'fieldName', LongSumAggregator::class],
        ];
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testFailCreteArithmeticAggregator()
    {
        $factory = new AggregatorFactory();
        $factory->arithmeticAggregator('not_exists_type', 'name', 'fieldName');
    }

    public function testFilteredAggregator()
    {
        $factory = new AggregatorFactory();

        $filterMock = $this->getMock(FilterInterface::class);
        $aggregatorMock = $this->getMock(AggregatorInterface::class);

        $aggregator = $factory->filtered($filterMock, $aggregatorMock);
        $this->assertInstanceOf(FilteredAggregator::class, $aggregator);
    }
}
