<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\QueryBuilder;

use Druid\Query\Component\ComponentInterface;
use Druid\Query\Component\Factory\AggregatorFactory;
use Druid\Query\Component\Factory\PostAggregatorFactory;
use Druid\Query\QueryInterface;

/**
 * Class AbstractQueryBuilder
 * @package Druid\QueryBuilder
 */
abstract class AbstractQueryBuilder
{

    protected $components = [];

    /**
     * @return AggregatorFactory
     */
    public function aggregator()
    {
        return new AggregatorFactory();
    }

    /**
     * @return PostAggregatorFactory
     */
    public function postAggregator()
    {
        return new PostAggregatorFactory();
    }

    /**
     * @param string $componentName
     * @param ComponentInterface $component
     * @return $this
     */
    public function addComponent($componentName, ComponentInterface $component)
    {
        $componentExists = array_key_exists($componentName, $this->components);
        if (!$componentExists) {
            throw new \InvalidArgumentException(
                sprintf('Undefined component name %s', $componentName)
            );
        }

        $isMultipleComponent = is_array($this->components[$componentName]);
        if ($isMultipleComponent) {
            $this->components[$componentName] = \array_merge($this->components[$componentName], [$component]);
            return $this;
        }

        $this->components[$componentName] = $component;
        return $this;
    }

    /**
     * @return QueryInterface
     */
    abstract public function getQuery();
}
