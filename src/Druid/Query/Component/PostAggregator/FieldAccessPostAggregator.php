<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\PostAggregator;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\PostAggregatorInterface;

class FieldAccessPostAggregator extends AbstractTypedComponent implements PostAggregatorInterface
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $fieldName;

    /**
     * FieldAccessPostAggregator constructor.
     * @param string $name
     * @param string $fieldName
     */
    public function __construct($name, $fieldName)
    {
        parent::__construct(self::TYPE_FIELD_ACCESS);
        $this->name = $name;
        $this->fieldName = $fieldName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }
}
