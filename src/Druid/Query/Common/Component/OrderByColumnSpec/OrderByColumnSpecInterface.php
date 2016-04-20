<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\OrderByColumnSpec;

use Druid\Query\Common\ComponentInterface;

interface OrderByColumnSpecInterface extends ComponentInterface
{

    /**
     * @return string
     */
    public function getDimension();

    /**
     * @return string <"ascending"|"descending">
     */
    public function getDirection();
}
