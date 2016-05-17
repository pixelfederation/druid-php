<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Driver;

/**
 * Interface ResponseInterface.
 */
interface ResponseInterface
{
    /**
     * @return array
     */
    public function getRecords();
}
