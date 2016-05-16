<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component;

interface CollectionInterface
{

    /**
     * @param array|ComponentInterface[] $components
     * @return $this
     */
    public function set(array $components);

    /**
     * @param ComponentInterface $component
     * @return $this
     */
    public function add(ComponentInterface $component);

    /**
     * @return array|ComponentInterface[]
     */
    public function get();
}
