<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component;

/**
 * Interface FilterInterface.
 */
interface FilterInterface extends TypedInterface, ComponentInterface
{
    const TYPE_SELECTOR = 'selector';
    const TYPE_LOGICAL_AND = 'and';
    const TYPE_LOGICAL_OR = 'or';
    const TYPE_LOGICAL_NOT = 'not';
}
