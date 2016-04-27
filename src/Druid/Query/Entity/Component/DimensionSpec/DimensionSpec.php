<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\DimensionSpec;

use Druid\Query\Common\Component\DimensionSpec\DimensionSpecInterface;

/**
 * Class DimensionSpec
 *
 * @package Druid\Query\Entity\Component\DimensionSpec
 */
class DimensionSpec implements DimensionSpecInterface
{

    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $dimension;

    /**
     * @var string
     */
    private $outputName;

    /**
     * DimensionSpec constructor.
     *
     * @param string $type
     * @param string $dimension
     * @param string $outputName
     */
    public function __construct($type, $dimension, $outputName = null)
    {
        $this->type = $type;
        $this->dimension = $dimension;
        $this->outputName = $outputName;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
    public function getOutputName()
    {
        return $this->outputName;
    }
}
