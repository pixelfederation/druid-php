<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\QueryBuilder;

use Druid\Query\Entity\Aggregation\GroupBy;
use Druid\Query\Entity\Component;

/**
 * Class GroupByQueryBuilder
 * @package Druid\QueryBuilder
 */
class GroupByQueryBuilder extends AbstractQueryBuilder
{
    /**
     * @inheritdoc
     */
    public function getQuery()
    {
        $query = new GroupBy();
        if ($this->has(self::AGG_PART)) {
            $query->setAggregations(
                new Component\Aggregation\AggregationCollection($this->get(self::AGG_PART))
            );
        }

        if ($this->has(self::POST_AGG_PART)) {
            $query->setPostAggregations(
                new Component\PostAggregation\PostAggregatorCollection($this->get(self::POST_AGG_PART))
            );
        }

        $query->setDataSource($this->get(self::DATA_SOURCE_PART)[0]);
        $query->setIntervals(
            new Component\Interval\IntervalCollection($this->get(self::INTERVAL_PART))
        );

        $query->setGranularity($this->get(self::GRANULARITY_PART)[0]);

        if ($this->has(self::DIMENSION_PART)) {
            $query->setDimensions(
                new Component\DimensionSpec\DimensionSpecCollection($this->get(self::DIMENSION_PART))
            );
        }

        return $query;
    }
}
