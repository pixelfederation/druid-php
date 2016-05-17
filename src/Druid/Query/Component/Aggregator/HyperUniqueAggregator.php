<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component\Aggregator;

use Druid\Query\Component\AggregatorInterface;

/**
 * Class HyperUniqueAggregator.
 */
class HyperUniqueAggregator extends AbstractArithmeticalAggregator implements AggregatorInterface
{
    /**
     * HyperUniqueAggregator constructor.
     *
     * @param string $name
     * @param string $fieldName
     */
    public function __construct($name, $fieldName)
    {
        parent::__construct(self::TYPE_HYPER_UNIQUE, $name, $fieldName);
    }
}
