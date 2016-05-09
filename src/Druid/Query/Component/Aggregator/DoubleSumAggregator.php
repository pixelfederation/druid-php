<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Aggregator;

use Druid\Query\Component\AggregatorInterface;

/**
 * Class DoubleSumAggregator
 * @package Druid\Query\Component\Aggregator
 */
class DoubleSumAggregator extends AbstractArithmeticalAggregator implements AggregatorInterface
{
    public function __construct($name, $fieldName)
    {
        parent::__construct(self::TYPE_DOUBLE_SUM, $name, $fieldName);
    }
}
