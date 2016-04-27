<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Aggregation;

use Druid\Query\Common\Component\Aggregation\AggregationInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Aggregation
 *
 * @package Druid\Query\Entity\Component\Aggregation
 */
class Aggregation implements AggregationInterface
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $fieldName;

    /**
     * Aggregation constructor.
     *
     * @param string $type
     * @param string $name
     * @param string $fieldName
     */
    public function __construct($type, $name, $fieldName = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->fieldName = $fieldName;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Aggregation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Aggregation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * @param mixed $fieldName
     * @return Aggregation
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;

        return $this;
    }
}
