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
     * @var DimensionSpecInterface[]
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
     * @var AggregatorInterface[]
     */
    private $aggregations;

    /**
     * @var PostAggregatorInterface[]
     */
    private $postAggregations;

    /**
     * @var IntervalInterface[]
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
     */
    public function setDataSource($dataSource)
    {
        $this->dataSource = $dataSource;
    }

    /**
     * @return \Druid\Query\Component\DimensionSpecInterface[]
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param \Druid\Query\Component\DimensionSpecInterface[] $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
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
     */
    public function setLimitSpec($limitSpec)
    {
        $this->limitSpec = $limitSpec;
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
     */
    public function setGranularity($granularity)
    {
        $this->granularity = $granularity;
    }

    /**
     * @return \Druid\Query\Component\AggregatorInterface[]
     */
    public function getAggregations()
    {
        return $this->aggregations;
    }

    /**
     * @param \Druid\Query\Component\AggregatorInterface[] $aggregations
     */
    public function setAggregations($aggregations)
    {
        $this->aggregations = $aggregations;
    }

    /**
     * @return \Druid\Query\Component\PostAggregatorInterface[]
     */
    public function getPostAggregations()
    {
        return $this->postAggregations;
    }

    /**
     * @param \Druid\Query\Component\PostAggregatorInterface[] $postAggregations
     */
    public function setPostAggregations($postAggregations)
    {
        $this->postAggregations = $postAggregations;
    }

    /**
     * @return \Druid\Query\Component\IntervalInterface[]
     */
    public function getIntervals()
    {
        return $this->intervals;
    }

    /**
     * @param \Druid\Query\Component\IntervalInterface[] $intervals
     */
    public function setIntervals($intervals)
    {
        $this->intervals = $intervals;
    }
}
