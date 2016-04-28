<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\PostAggregation;

use Druid\Query\Common\Component\PostAggregation\ConstantPostAggregatorInterface;

/**
 * Class ConstantPostAggregator
 * @package Druid\Query\Entity\Component\PostAggregation
 */
class ConstantPostAggregator extends AbstractPostAggregator implements ConstantPostAggregatorInterface
{

    /**
     * @var float|int
     */
    private $value;

    /**
     * ConstantPostAggregator constructor.
     * @param float|int $value
     * @param string $name
     */
    public function __construct($name, $value)
    {
        parent::__construct(self::CONSTANT_TYPE, $name);
        $this->value = $value;
    }

    /**
     * @return float|int
     */
    public function getValue()
    {
        return $this->value;
    }
}
