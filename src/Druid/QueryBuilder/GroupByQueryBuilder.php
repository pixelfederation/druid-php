<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\QueryBuilder;

use Druid\Query\Aggregation\GroupBy;
use Druid\Query\Component\AggregatorInterface;
use Druid\Query\Component\DataSource\TableDataSource;
use Druid\Query\Component\DimensionSpec\DefaultDimensionSpec;
use Druid\Query\Component\FilterInterface;
use Druid\Query\Component\Granularity\PeriodGranularity;
use Druid\Query\Component\HavingInterface;
use Druid\Query\Component\Interval\Interval;
use Druid\Query\Component\PostAggregatorInterface;

/**
 * Class GroupByQueryBuilder.
 */
class GroupByQueryBuilder extends AbstractQueryBuilder
{
    protected $components = [
        'dataSource' => null,
        'dimensions' => [],
        'limitSpec' => null,
        'having' => null,
        'granularity' => null,
        'filter' => null,
        'aggregations' => [],
        'postAggregations' => [],
        'intervals' => [],
    ];

    /**
     * @param string $dataSource
     *
     * @return $this
     */
    public function setDataSource($dataSource)
    {
        return $this->addComponent('dataSource', new TableDataSource($dataSource));
    }

    /**
     * @param string $period
     * @param string $timeZone
     *
     * @return $this
     */
    public function setGranularity($period, $timeZone = 'UTC')
    {
        return $this->addComponent('granularity', new PeriodGranularity($period, $timeZone));
    }

    /**
     * @param \DateTime $start
     * @param \DateTime $end
     *
     * @return $this
     */
    public function addInterval(\DateTime $start, \DateTime $end)
    {
        return $this->addComponent('intervals', new Interval($start, $end));
    }

    /**
     * @param AggregatorInterface $aggregator
     *
     * @return $this
     */
    public function addAggregator(AggregatorInterface $aggregator)
    {
        return $this->addComponent('aggregations', $aggregator);
    }

    /**
     * @param string $dimension
     * @param string $outputName
     *
     * @return $this
     */
    public function addDimension($dimension, $outputName)
    {
        return $this->addComponent('dimensions', new DefaultDimensionSpec($dimension, $outputName));
    }

    /**
     * @param PostAggregatorInterface $postAggregator
     *
     * @return $this
     */
    public function addPostAggregator(PostAggregatorInterface $postAggregator)
    {
        return $this->addComponent('postAggregations', $postAggregator);
    }

    /**
     * @param FilterInterface $filter
     *
     * @return $this
     */
    public function setFilter(FilterInterface $filter)
    {
        return $this->addComponent('filter', $filter);
    }

    /**
     * @param HavingInterface $having
     *
     * @return $this
     */
    public function setHaving(HavingInterface $having)
    {
        return $this->addComponent('having', $having);
    }

    /**
     * @return GroupBy
     */
    public function getQuery()
    {
        $query = new GroupBy();
        foreach ($this->components as $componentName => $component) {
            if (!empty($component)) {
                $method = 'set'.ucfirst($componentName);
                $query->$method($component);
            }
        }

        return $query;
    }
}
