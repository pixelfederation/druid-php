<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Filter;

use Druid\Query\Common\Component\Filter\FilterInterface;

/**
 * Class AbstractFilter
 * @package Druid\Query\Entity\Component\Filter
 */
abstract class AbstractFilter implements FilterInterface
{
    /**
     * @var string
     */
    protected $type;

    /**
     * AbstractFilter constructor.
     * @param string $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
