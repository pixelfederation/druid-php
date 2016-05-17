<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component\DimensionSpec;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\DimensionSpecInterface;

/**
 * Class DefaultDimension.
 */
class DefaultDimensionSpec extends AbstractTypedComponent implements DimensionSpecInterface
{
    /**
     * @var string
     */
    private $dimension;

    /**
     * @var string
     */
    private $outputName;

    /**
     * DefaultDimension constructor.
     *
     * @param string $dimension
     * @param string $outputName
     */
    public function __construct($dimension, $outputName)
    {
        $this->dimension = $dimension;
        $this->outputName = $outputName;
        parent::__construct(self::TYPE_DEFAULT);
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
