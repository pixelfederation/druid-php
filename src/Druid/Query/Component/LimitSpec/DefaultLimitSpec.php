<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component\LimitSpec;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\LimitSpecInterface;

/**
 * Class DefaultLimitSpec.
 */
class DefaultLimitSpec extends AbstractTypedComponent implements LimitSpecInterface
{
    /**
     * @var int
     */
    private $limit;

    /**
     * @var string
     */
    private $columns;

    /**
     * DefaultLimitSpec constructor.
     *
     * @param int    $limit   Number of limit.
     * @param string $columns Columns for ordering.
     */
    public function __construct($limit, $columns)
    {
        parent::__construct(self::TYPE_DEFAULT);
        $this->limit = $limit;
        $this->columns = $columns;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return string
     */
    public function getColumns()
    {
        return $this->columns;
    }
}
