<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\DataSource;

abstract class AbstractDataSource
{
    const TYPE_TABLE = 'table';

    /**
     * @var string
     */
    private $type;

    /**
     * AbstractDataSource constructor.
     * @param string $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }


    public function getType()
    {
        return $this->type;
    }
}