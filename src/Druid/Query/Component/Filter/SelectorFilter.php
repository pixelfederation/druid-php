<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Filter;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\FilterInterface;

/**
 * Class SelectorFilter
 * @package Druid\Query\Component\Filter
 */
class SelectorFilter extends AbstractTypedComponent implements FilterInterface
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
        parent::__construct(self::TYPE_SELECTOR);
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
