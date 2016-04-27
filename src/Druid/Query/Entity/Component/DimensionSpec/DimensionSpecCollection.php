<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\DimensionSpec;

use Druid\Query\Common\Component\DimensionSpec\DimensionSpecCollectionInterface;
use Druid\Query\Common\Component\DimensionSpec\DimensionSpecInterface;

/**
 * Class DimensionSpecCollection
 *
 * @package Druid\Query\Entity\Component\DimensionSpec
 */
class DimensionSpecCollection implements DimensionSpecCollectionInterface
{

    /**
     * @var array|DimensionSpecInterface[]
     */
    private $dimensions;

    /**
     * DimensionSpecCollection constructor.
     *
     * @param array|\Druid\Query\Common\Component\DimensionSpec\DimensionSpecInterface[] $dimensions
     */
    public function __construct(array $dimensions = [])
    {
        $this->setDimensions($dimensions);
    }

    /**
     * @return array|\Druid\Query\Common\Component\DimensionSpec\DimensionSpecInterface[]
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param array|\Druid\Query\Common\Component\DimensionSpec\DimensionSpecInterface[] $dimensions
     * @return DimensionSpecCollection
     */
    public function setDimensions($dimensions)
    {
        foreach ($dimensions as $dimension) {
            $this->addDimension($dimension);
        }

        return $this;
    }

    /**
     * @param DimensionSpecInterface $dimension
     * @return $this
     */
    public function addDimension(DimensionSpecInterface $dimension)
    {
        $this->dimensions[] = $dimension;

        return $this;
    }
}
