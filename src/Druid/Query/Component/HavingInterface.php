<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component;

/**
 * Class HavingInterface.
 */
interface HavingInterface extends TypedInterface, ComponentInterface
{
    const TYPE_NUMERIC_EQUAL_TO = 'equalTo';
    const TYPE_NUMERIC_GREATER_THAN = 'greaterThan';
    const TYPE_NUMERIC_LESS_THAN = 'lessThan';
    const TYPE_LOGICAL_AND = 'and';
    const TYPE_LOGICAL_OR = 'or';
    const TYPE_LOGICAL_NOT = 'not';
}
