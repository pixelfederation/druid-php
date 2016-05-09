<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\PostAggregator;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\PostAggregatorInterface;

/**
 * Class ConstantPostAggregator
 * @package Druid\Query\Component\PostAggregator
 */
class ConstantPostAggregator extends AbstractTypedComponent implements PostAggregatorInterface
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var int|float
     */
    private $value;

    /**
     * ConstantPostAggregator constructor.
     * @param string $name
     * @param float|int $value
     */
    public function __construct($name, $value)
    {
        parent::__construct(self::TYPE_CONSTANT);
        $this->name = $name;
        $this->value = $value;
    }
}
