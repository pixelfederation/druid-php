<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component\Aggregator;

use Druid\Query\Component\AggregatorInterface;

class LongSumAggregator extends AbstractArithmeticalAggregator implements AggregatorInterface
{
    /**
     * LongSumAggregator constructor.
     *
     * @param string $name
     * @param string $fieldName
     */
    public function __construct($name, $fieldName)
    {
        parent::__construct(self::TYPE_LONG_SUM, $name, $fieldName);
    }
}
