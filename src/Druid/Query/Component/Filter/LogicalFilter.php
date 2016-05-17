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
 * Class LogicalFilter.
 */
class LogicalFilter extends AbstractTypedComponent implements FilterInterface
{
    /**
     * @var array|FilterInterface[]
     */
    private $fields;

    /**
     * LogicalFilter constructor.
     *
     * @param string                                         $type
     * @param array|\Druid\Query\Component\FilterInterface[] $fields
     */
    public function __construct($type, array $fields)
    {
        parent::__construct($type);
        $this->fields = $fields;
    }
}
