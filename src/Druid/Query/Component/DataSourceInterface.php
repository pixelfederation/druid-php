<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component;

/**
 * Interface DataSourceInterface.
 */
interface DataSourceInterface extends TypedInterface, ComponentInterface
{
    const TYPE_TABLE = 'table';
}
