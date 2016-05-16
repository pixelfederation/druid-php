<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Aggregator;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\AggregatorInterface;

/**
 * Class CountAggregator
 * @package Druid\Query\Component\Aggregator
 */
class CountAggregator extends AbstractTypedComponent implements AggregatorInterface
{
    private $name;

    /**
     * CountAggregator constructor.
     * @param $name
     */
    public function __construct($name)
    {
        parent::__construct(self::TYPE_COUNT);
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
