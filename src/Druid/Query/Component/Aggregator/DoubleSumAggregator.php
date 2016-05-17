<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component\Aggregator;

use Druid\Query\Component\AggregatorInterface;

/**
 * Class DoubleSumAggregator.
 */
class DoubleSumAggregator extends AbstractArithmeticalAggregator implements AggregatorInterface
{
    /**
     * DoubleSumAggregator constructor.
     *
     * @param string $name
     * @param string $fieldName
     */
    public function __construct($name, $fieldName)
    {
        parent::__construct(self::TYPE_DOUBLE_SUM, $name, $fieldName);
    }
}
