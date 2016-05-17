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
 * Class NotFilter.
 */
class NotFilter extends AbstractTypedComponent implements FilterInterface
{
    /**
     * @var FilterInterface
     */
    private $field;

    /**
     * NotFilter constructor.
     *
     * @param FilterInterface $field
     */
    public function __construct(FilterInterface $field)
    {
        parent::__construct(FilterInterface::TYPE_LOGICAL_NOT);
        $this->field = $field;
    }

    /**
     * @return FilterInterface
     */
    public function getField()
    {
        return $this->field;
    }
}
