<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Filter;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\FilterInterface;

/**
 * Class AndFilter
 * @package Druid\Query\Component\Filter
 */
class AndFilter extends AbstractTypedComponent implements FilterInterface
{

    /**
     * @var array|FilterInterface[]
     */
    private $fields;

    /**
     * AndFilter constructor.
     * @param array|\Druid\Query\Component\FilterInterface[] $fields
     */
    public function __construct(array $fields)
    {
        parent::__construct(self::TYPE_LOGICAL_AND);
        $this->fields = $fields;
    }

    /**
     * @return array|\Druid\Query\Component\FilterInterface[]
     */
    public function getFields()
    {
        return $this->fields;
    }
}
