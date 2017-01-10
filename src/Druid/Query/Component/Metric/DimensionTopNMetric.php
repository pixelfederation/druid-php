<?php

namespace Druid\Query\Component\Metric;

use Druid\Query\Component\MetricInterface;

class DimensionTopNMetric implements MetricInterface
{

    const ORDERING_LEXICOGRAPHIC = 'lexicographic';
    const ORDERING_ALPHANUMERIC = 'alphanumeric';
    const ORDERING_NUMERIC = 'numeric';
    const ORDERING_STRLEN = 'strlen';

    /** @var string */
    private $type = '';

    /** @var string */
    private $ordering = '';

    /** @var string */
    private $previousStop = '';

    public function __construct($ordering = null, $previousStop = null)
    {
        $this->type = self::TYPE_DIMENSION;
        $this->setOrdering($ordering);
        $this->setPreviousStop($previousStop);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $ordering
     * @return DimensionTopNMetric
     */
    public function setOrdering($ordering)
    {
        $this->ordering = (is_null($ordering) || !in_array($ordering, [
                self::ORDERING_LEXICOGRAPHIC,
                self::ORDERING_ALPHANUMERIC,
                self::ORDERING_NUMERIC,
                self::ORDERING_STRLEN,
            ])) ? self::ORDERING_LEXICOGRAPHIC : $ordering;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * @param string $previousStop
     * @return DimensionTopNMetric
     */
    public function setPreviousStop($previousStop)
    {
        is_null($previousStop) || ($this->previousStop = $previousStop);
        return $this;
    }

    /**
     * @return string
     */
    public function getPreviousStop()
    {
        return $this->previousStop;
    }
}
