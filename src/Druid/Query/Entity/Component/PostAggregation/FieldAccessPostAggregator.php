<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\PostAggregation;

use Druid\Query\Common\Component\PostAggregation\FieldAccessPostAggregatorInterface;

/**
 * Class FieldAccessPostAggregator
 * @package Druid\Query\Entity\Component\PostAggregation
 */
class FieldAccessPostAggregator extends AbstractPostAggregator implements FieldAccessPostAggregatorInterface
{
    /**
     * @var string
     */
    private $fieldName;

    public function __construct($name, $fieldName)
    {
        parent::__construct(self::FIELD_ACCESS_TYPE, $name);
        $this->fieldName = $fieldName;
    }

    /**
     * @return string
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }
}
