<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\LimitSpec;

use Druid\Query\Common\Component\OrderByColumnSpec\OrderByColumnSpecCollectionInterface;
use Druid\Query\Common\ComponentInterface;

interface LimitSpecInterface extends ComponentInterface
{

    /**
     * @return string
     */
    public function getType();

    /**
     * @return int
     */
    public function getLimit();

    /**
     * @return OrderByColumnSpecCollectionInterface
     */
    public function getColumns();
}
