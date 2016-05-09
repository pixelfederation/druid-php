<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component;

/**
 * Interface GranularityInterface
 * @package Druid\Query\Component
 */
interface GranularityInterface extends TypedInterface, ComponentInterface
{
    const TYPE_PERIOD = 'period';
}
