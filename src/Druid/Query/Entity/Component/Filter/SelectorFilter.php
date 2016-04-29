<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Filter;

use Druid\Query\Common\Component\Filter\SelectorFilterInterface;

/**
 * Class SelectorFilter
 * @package Druid\Query\Entity\Component\Filter
 */
class SelectorFilter extends AbstractFilter implements SelectorFilterInterface
{
    /**
     * @var string
     */
    private $dimension;

    /**
     * @var string
     */
    private $value;

    /**
     * SelectorFilter constructor.
     * @param string $dimension
     * @param string $value
     */
    public function __construct($dimension, $value)
    {
        parent::__construct(self::SELECTOR_TYPE);
        $this->dimension = $dimension;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
