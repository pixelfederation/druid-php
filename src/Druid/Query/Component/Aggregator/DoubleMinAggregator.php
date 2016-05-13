<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Aggregator;

use Druid\Query\Component\AggregatorInterface;

/**
 * Class DoubleMinAggregator
 * @package Druid\Query\Component\Aggregator
 */
class DoubleMinAggregator extends AbstractArithmeticalAggregator implements AggregatorInterface
{
    /**
     * DoubleMinAggregator constructor.
     * @param string $name
     * @param string $fieldName
     */
    public function __construct($name, $fieldName)
    {
        parent::__construct(self::TYPE_DOUBLE_MIN, $name, $fieldName);
    }
}
