<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Factory;

use Druid\Query\Common\Component\Factory\ComponentFactoryInterface;

/**
 * Class ComponentFactoryManager
 * @package Druid\Query\Entity\Component\Factory
 */
class ComponentFactoryManager
{
    /**
     * @var array
     */
    private $factories;

    /**
     * ComponentFactoryManager constructor.
     * @param array $factories
     */
    public function __construct(array $factories = [])
    {
        $this->setFactories($factories);
    }

    /**
     * @param array $factories
     * @return $this
     */
    public function setFactories(array $factories)
    {
        foreach ($factories as $factory) {
            $this->addFactory($factory);
        }

        return $this;
    }

    /**
     * @param ComponentFactoryInterface $factory
     * @return $this
     */
    public function addFactory(ComponentFactoryInterface $factory)
    {
        $this->factories[$factory->getType()] = $factory;

        return $this;
    }

    /**
     * @param string $type
     * @return ComponentFactoryInterface
     */
    public function getFactory($type)
    {
        return $this->factories[$type];
    }
}
