<?php

namespace Druid\Query\Component\Metric;

use Druid\Query\Component\MetricInterface;

class NumericTopNMetric implements MetricInterface
{

    /** @var string */
    private $type = '';

    /** @var string */
    private $metric = '';

    public function __construct($metric = null)
    {
        $this->type = self::TYPE_NUMERIC;
        $this->setMetric($metric);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $metric
     * @return NumericTopNMetric
     */
    public function setMetric($metric)
    {
        !is_null($metric) && ($this->metric = $metric);
        return $this;
    }

    /**
     * @return string
     */
    public function getMetric()
    {
        return $this->metric;
    }
}
