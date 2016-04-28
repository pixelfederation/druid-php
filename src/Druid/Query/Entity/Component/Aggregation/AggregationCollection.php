<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Aggregation;

use Druid\Query\Common\Component\Aggregation\AggregationCollectionInterface;
use Druid\Query\Common\Component\Aggregation\AggregatorInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class AggregationCollection
 *
 * @package Druid\Query\Entity\Component\Aggregation
 */
class AggregationCollection implements AggregationCollectionInterface
{
    /**
     * @var array|AggregatorInterface[]
     * @Serializer\Type("array")
     * @Serializer\Inline
     */
    protected $aggregations;

    /**
     * AggregationCollection constructor.
     *
     * @param array|\Druid\Query\Common\Component\Aggregation\AggregatorInterface[] $aggregations
     */
    public function __construct(array $aggregations = [])
    {
        $this->setAggregations($aggregations);
    }

    /**
     * @param array $aggregations
     * @return $this
     */
    public function setAggregations(array $aggregations)
    {
        foreach ($aggregations as $aggregation) {
            $this->addAggregation($aggregation);
        }

        return $this;
    }

    /**
     * @param AggregatorInterface $aggregation
     * @return $this
     */
    public function addAggregation(AggregatorInterface $aggregation)
    {
        $this->aggregations[] = $aggregation;

        return $this;
    }

    /**
     * @return array|AggregatorInterface[]
     */
    public function getAggregations()
    {
        return $this->aggregations;
    }
}
