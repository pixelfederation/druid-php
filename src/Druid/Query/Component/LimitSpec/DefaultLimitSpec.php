<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\LimitSpec;

use Druid\Query\Component\TypedInterface;

class DefaultLimitSpec extends AbstractLimitSpec implements TypedInterface
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
     * @param int $limit
     * @param string $columns
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