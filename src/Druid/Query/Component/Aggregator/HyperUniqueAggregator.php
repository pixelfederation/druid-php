<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Aggregator;

use Druid\Query\Component\AggregatorInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class HyperUniqueAggregator
 * @package Druid\Query\Component\Aggregator
 */
class HyperUniqueAggregator extends AbstractArithmeticalAggregator implements AggregatorInterface
{
    public function __construct($name, $fieldName)
    {
        parent::__construct(self::TYPE_HYPER_UNIQUE, $name, $fieldName);
    }
}
