<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Aggregation;

use Druid\Query\Common\Component\Aggregation\AggregationCollectionInterface;
use Druid\Query\Common\Component\Aggregation\AggregationInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class AggregationCollection
 *
 * @package Druid\Query\Entity\Component\Aggregation
 */
class AggregationCollection implements AggregationCollectionInterface
{
    /**
     * @var array|AggregationInterface[]
     * @Serializer\Type("array<Druid\Query\Entity\Component\Aggregation\Aggregation>")
     * @Serializer\Inline
     */
    protected $aggregations;

    /**
     * AggregationCollection constructor.
     *
     * @param array|\Druid\Query\Common\Component\Aggregation\AggregationInterface[] $aggregations
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
     * @param AggregationInterface $aggregation
     * @return $this
     */
    public function addAggregation(AggregationInterface $aggregation)
    {
        $this->aggregations[] = $aggregation;

        return $this;
    }

    /**
     * @return array|AggregationInterface[]
     */
    public function getAggregations()
    {
        return $this->aggregations;
    }
}
