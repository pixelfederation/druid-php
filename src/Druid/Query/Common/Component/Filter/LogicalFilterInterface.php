<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\Filter;

interface LogicalFilterInterface extends FilterInterface
{

    /**
     * @return FilterInterface[]|array
     */
    public function getFields();
}
