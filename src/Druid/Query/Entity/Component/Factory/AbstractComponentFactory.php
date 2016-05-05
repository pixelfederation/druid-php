<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Factory;

/**
 * Class AbstractComponentFactory
 * @package Druid\Query\Entity\Component\Factory
 */
abstract class AbstractComponentFactory
{
    /**
     * @param $type
     * @param array $args
     * @return mixed
     */
    public function create($type, array $args = [])
    {
        $method = 'create' . ucfirst($type);
        return \call_user_func_array([$this, $method], $args);
    }
}
