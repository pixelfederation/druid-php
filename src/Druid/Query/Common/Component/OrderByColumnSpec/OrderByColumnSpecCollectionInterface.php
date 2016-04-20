<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\OrderByColumnSpec;

use Druid\Query\Common\ComponentInterface;

interface OrderByColumnSpecCollectionInterface extends ComponentInterface
{

    /**
     * @return OrderByColumnSpecInterface[]|array
     */
    public function getOrderByColumns();
}
