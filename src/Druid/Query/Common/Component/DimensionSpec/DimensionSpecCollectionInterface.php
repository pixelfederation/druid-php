<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\DimensionSpec;

use Druid\Query\Common\ComponentInterface;

interface DimensionSpecCollectionInterface extends ComponentInterface
{

    /**
     * @return DimensionSpecInterface[]|array
     */
    public function getDimensions();
}
