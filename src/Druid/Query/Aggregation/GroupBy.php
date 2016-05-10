<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Aggregation;

use Druid\Query\AbstractQuery;
use Druid\Query\Component\AggregatorInterface;
use Druid\Query\Component\DataSourceInterface;
use Druid\Query\Component\DimensionSpecInterface;
use Druid\Query\Component\GranularityInterface;
use Druid\Query\Component\IntervalInterface;
use Druid\Query\Component\LimitSpecInterface;
use Druid\Query\Component\PostAggregatorInterface;
use Druid\Query\QueryInterface;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class GroupBy
 * @package Druid\Query\Aggregation
 */
class GroupBy extends AbstractQuery implements QueryInterface
{
    /**
     * @var DataSourceInterface
     */
    private $dataSource;

    /**
     * @var array|DimensionSpecInterface[]
     */
    private $dimensions;

    /**
     * @var LimitSpecInterface
     */
    private $limitSpec;

    /**
     * @var GranularityInterface
     */
    private $granularity;

    /**
     * @var array|AggregatorInterface[]
     */
    private $aggregations;

    /**
     * @var array|PostAggregatorInterface[]
     */
    private $postAggregations;

    /**
     * @var array|IntervalInterface[]
     * @Serializer\Type("array<string>")
     */
    private $intervals;

    public function __construct()
    {
        parent::__construct(self::TYPE_GROUP_BY);
    }

    /**
     * @return DataSourceInterface
     */
    public function getDataSource()
    {
        return $this->dataSource;
    }

    /**
     * @param DataSourceInterface $dataSource
     * @return GroupBy
     */
    public function setDataSource($dataSource)
    {
        $this->dataSource = $dataSource;

        return $this;
    }

    /**
     * @return array|\Druid\Query\Component\DimensionSpecInterface[]
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param array|\Druid\Query\Component\DimensionSpecInterface[] $dimensions
     * @return GroupBy
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    /**
     * @return LimitSpecInterface
     */
    public function getLimitSpec()
    {
        return $this->limitSpec;
    }

    /**
     * @param LimitSpecInterface $limitSpec
     * @return GroupBy
     */
    public function setLimitSpec($limitSpec)
    {
        $this->limitSpec = $limitSpec;

        return $this;
    }

    /**
     * @return GranularityInterface
     */
    public function getGranularity()
    {
        return $this->granularity;
    }

    /**
     * @param GranularityInterface $granularity
     * @return GroupBy
     */
    public function setGranularity($granularity)
    {
        $this->granularity = $granularity;

        return $this;
    }

    /**
     * @return array|\Druid\Query\Component\AggregatorInterface[]
     */
    public function getAggregations()
    {
        return $this->aggregations;
    }

    /**
     * @param array|\Druid\Query\Component\AggregatorInterface[] $aggregations
     * @return GroupBy
     */
    public function setAggregations($aggregations)
    {
        $this->aggregations = $aggregations;

        return $this;
    }

    /**
     * @return array|\Druid\Query\Component\PostAggregatorInterface[]
     */
    public function getPostAggregations()
    {
        return $this->postAggregations;
    }

    /**
     * @param array|\Druid\Query\Component\PostAggregatorInterface[] $postAggregations
     * @return GroupBy
     */
    public function setPostAggregations($postAggregations)
    {
        $this->postAggregations = $postAggregations;

        return $this;
    }

    /**
     * @return array|\Druid\Query\Component\IntervalInterface[]
     */
    public function getIntervals()
    {
        return $this->intervals;
    }

    /**
     * @param array|\Druid\Query\Component\IntervalInterface[] $intervals
     * @return GroupBy
     */
    public function setIntervals($intervals)
    {
        $this->intervals = $intervals;
        
        return $this;
    }
}
