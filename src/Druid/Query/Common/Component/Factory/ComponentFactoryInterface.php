<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\Factory;

use Druid\Query\Common\ComponentInterface;

/**
 * Interface ComponentFactoryInterface
 * @package Druid\Query\Common\Component\Factory
 */
interface ComponentFactoryInterface
{

    /**
     * @return string
     */
    public function getType();

    /**
     * @param string $type
     * @param array $args
     * @return ComponentInterface
     */
    public function create($type, array $args = []);
}
