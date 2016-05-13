<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Aggregator;

use Druid\Query\Component\AggregatorInterface;

/**
 * Class DoubleMaxAggregator
 * @package Druid\Query\Component\Aggregator
 */
class DoubleMaxAggregator extends AbstractArithmeticalAggregator implements AggregatorInterface
{
    public function __construct($name, $fieldName)
    {
        parent::__construct(self::TYPE_DOUBLE_MAX, $name, $fieldName);
    }
}
