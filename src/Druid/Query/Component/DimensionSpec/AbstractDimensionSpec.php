<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\DimensionSpec;

use Druid\Query\Component\TypedInterface;

/**
 * Class AbstractDimension
 * @package Druid\Query\Component\Dimension
 */
abstract class AbstractDimensionSpec
{
    const TYPE_DEFAULT = 'default';

    /**
     * @var string
     */
    private $type;

    /**
     * AbstractDimension constructor.
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
