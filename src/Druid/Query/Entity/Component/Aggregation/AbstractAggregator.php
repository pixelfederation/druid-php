<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Aggregation;

use Druid\Query\Common\Component\Aggregation\AggregatorInterface;

abstract class AbstractAggregator implements AggregatorInterface
{

    /**
     * @var string
     */
    protected $type;

    /**
     * AbstractAggregator constructor.
     * @param string $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
