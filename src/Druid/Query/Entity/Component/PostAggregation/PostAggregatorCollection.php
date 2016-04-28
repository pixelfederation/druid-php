<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\PostAggregation;

use Druid\Query\Common\Component\PostAggregation\PostAggregatorCollectionInterface;
use Druid\Query\Common\Component\PostAggregation\PostAggregatorInterface;
use JMS\Serializer\Annotation as Serializer;

class PostAggregatorCollection implements PostAggregatorCollectionInterface
{

    /**
     * @var array|PostAggregatorInterface[]
     * @Serializer\Type("array")
     * @Serializer\Inline
     */
    protected $postAggregations;

    /**
     * PostAggregatorCollection constructor.
     * @param array|\Druid\Query\Common\Component\PostAggregation\PostAggregatorInterface[] $postAggregations
     */
    public function __construct(array $postAggregations = [])
    {
        $this->postAggregations = $postAggregations;
    }

    /**
     * @param array|\Druid\Query\Common\Component\PostAggregation\PostAggregatorInterface[] $postAggregations
     * @return PostAggregatorCollection
     */
    public function setPostAggregations(array $postAggregations)
    {
        foreach ($postAggregations as $aggregator) {
            $this->addPostAggregator($aggregator);
        }

        return $this;
    }

    /**
     * @param PostAggregatorInterface $postAggregator
     * @return $this
     */
    public function addPostAggregator(PostAggregatorInterface $postAggregator)
    {
        $this->postAggregations[] = $postAggregator;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getPostAggregations()
    {
        return $this->postAggregations;
    }
}
