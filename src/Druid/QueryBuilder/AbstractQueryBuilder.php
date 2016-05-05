<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\QueryBuilder;

use Druid\Query\Common\Component\Aggregation\AggregatorInterface;
use Druid\Query\Common\Component\Granularity\GranularityInterface;
use Druid\Query\Common\Component\PostAggregation\PostAggregatorInterface;
use Druid\Query\Common\ComponentInterface;
use Druid\Query\Common\QueryInterface;
use Druid\Query\Entity\Component;

/**
 * Class AbstractQueryBuilder
 * @package Druid\QueryBuilder
 */
abstract class AbstractQueryBuilder
{

    const AGG_PART = 'filteredAgg';
    const DATA_SOURCE_PART = 'dataSource';
    const INTERVAL_PART = 'interval';
    const GRANULARITY_PART = 'granularity';
    const POST_AGG_PART = 'postAgg';
    const DIMENSION_PART = 'dimension';

    protected $type;

    protected $parts;

    /**
     * @var Component\Component
     */
    protected $component;

    /**
     * QueryBuilder constructor.
     */
    public function __construct()
    {
        $this->parts = [];

        $factories = [];
        $factories[] = new Component\Factory\AggregatorComponentFactory();
        $factories[] = new Component\Factory\PostAggregatorComponentFactory();

        $this->component = new Component\Component(new Component\Factory\ComponentFactoryManager($factories));
    }

    /**
     * @param AggregatorInterface $aggregator
     * @return $this
     */
    public function addAggregator(AggregatorInterface $aggregator)
    {
        $this->add(self::AGG_PART, $aggregator);

        return $this;
    }

    /**
     * @param string $start
     * @param string $end
     * @return $this
     */
    public function addInterval($start, $end)
    {
        $this->add(self::INTERVAL_PART, new Component\Interval\Interval($start, $end));

        return $this;
    }

    /**
     * @param GranularityInterface $granularity
     * @return $this
     */
    public function setGranularity(GranularityInterface $granularity)
    {
        $this->remove(self::GRANULARITY_PART);
        $this->add(self::GRANULARITY_PART, $granularity);

        return $this;
    }

    /**
     * @param string $dataSource
     * @return $this
     */
    public function setDataSource($dataSource)
    {
        $this->remove(self::DATA_SOURCE_PART);
        $this->add(self::DATA_SOURCE_PART, $this->component->dataSource($dataSource));

        return $this;
    }

    /**
     * @param PostAggregatorInterface $aggregator
     * @return $this
     */
    public function addPostAggregator(PostAggregatorInterface $aggregator)
    {
        $this->add(self::POST_AGG_PART, $aggregator);

        return $this;
    }

    /**
     * @param string $name
     * @param string $outputName
     * @return $this
     */
    public function addDimension($name, $outputName = null)
    {
        $this->add(
            self::DIMENSION_PART,
            new Component\DimensionSpec\DimensionSpec(
                $name,
                Component\DimensionSpec\DimensionSpec::DEFAULT_TYPE_NAME,
                $outputName
            )
        );

        return $this;
    }

    /**
     * @return Component\Component
     */
    public function expr()
    {
        return $this->component;
    }

    /**
     * @param string $type
     * @param ComponentInterface $component
     */
    public function add($type, $component)
    {
        $this->parts[$type][] = $component;
    }

    /**
     * @param string $type
     * @return array
     */
    public function get($type)
    {
        return $this->parts[$type];
    }

    /**
     * @param string $type
     * @return bool
     */
    public function has($type)
    {
        return array_key_exists($type, $this->parts);
    }

    /**
     * @param string $type
     */
    public function remove($type)
    {
        if ($this->has($type)) {
            unset($this->parts[$type]);
        }
    }

    /**
     * @return QueryInterface
     */
    abstract public function getQuery();
}
