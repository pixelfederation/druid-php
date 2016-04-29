<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Response;

/**
 * Class Record
 * @package Druid\Response
 */
class Record
{
    /**
     * @var string
     */
    private $timestamp;

    /**
     * @var RecordResult
     */
    private $result;

    /**
     * Record constructor.
     * @param string $timestamp
     * @param RecordResult $result
     */
    public function __construct($timestamp, RecordResult $result)
    {
        $this->timestamp = $timestamp;
        $this->result = $result;
    }

    /**
     * @return string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return RecordResult
     */
    public function getResult()
    {
        return $this->result;
    }
}
