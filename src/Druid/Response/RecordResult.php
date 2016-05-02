<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Response;

/**
 * Class RecordResult
 * @package Druid\Response
 */
class RecordResult
{
    /**
     * @var array
     */
    private $data;

    /**
     * RecordResult constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param string $name
     * @param mixed $default
     * @return mixed|null
     */
    public function get($name, $default = null)
    {

        if ($this->has($name)) {
            return $this->data[$name];
        }

        return $default;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * @return array
     */
    public function asArray()
    {
        return $this->data;
    }
}
