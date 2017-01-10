<?php

namespace Druid\Query\Component\Metric;


use Druid\Query\Component\MetricInterface;

class InvertedTopNMetric implements MetricInterface
{

    /** @var string */
    private $type = '';

    /** @var string */
    private $metric = '';

    public function __construct($metric = null)
    {
        $this->type = self::TYPE_INVERTED;
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
     * @return InvertedTopNMetric
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