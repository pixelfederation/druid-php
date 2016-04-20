<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\Filter;

interface SelectorFilterInterface extends FilterInterface
{
    /**
     * @return string
     */
    public function getDimension();

    /**
     * @return string
     */
    public function getValue();
}
