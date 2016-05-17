<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component;

/**
 * Interface PostAggregatorInterface.
 */
interface PostAggregatorInterface extends TypedInterface, ComponentInterface
{
    const TYPE_ARITHMETIC = 'arithmetic';
    const TYPE_FIELD_ACCESS = 'fieldAccess';
    const TYPE_CONSTANT = 'constant';
}
