<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Driver;

/**
 * Class Record
 * @package Druid\Driver
 */
class Record implements RecordInterface
{

    /**
     * @var array
     */
    private $record;

    /**
     * Record constructor.
     * @param array $record
     */
    public function __construct(array $record)
    {
        $this->record = $record;
    }

    /**
     * @param string $fieldName
     * @return mixed|null
     */
    public function get($fieldName)
    {
        if (array_key_exists($fieldName, $this->record)) {
            return $this->record[$fieldName];
        }

        return null;
    }
}
