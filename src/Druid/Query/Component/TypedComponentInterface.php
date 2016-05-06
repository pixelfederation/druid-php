<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component;

interface TypedComponentInterface
{
    /**
     * @return string
     */
    public function getType();
}