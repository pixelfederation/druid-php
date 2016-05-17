<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Driver;

use Druid\Query\QueryInterface;

/**
 * Interface Connection.
 */
interface DriverConnectionInterface
{
    /**
     * @param QueryInterface $query
     *
     * @return ResponseInterface
     */
    public function send(QueryInterface $query);
}
