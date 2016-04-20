<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\DimensionSpec;

use Druid\Query\Common\ComponentInterface;

interface DimensionSpecInterface extends ComponentInterface
{

    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getDimension();

    /**
     * @return string
     */
    public function getOutputName();
}
