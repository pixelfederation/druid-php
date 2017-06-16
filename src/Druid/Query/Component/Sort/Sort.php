<?php

namespace Druid\Query\Component\Sort;

use Druid\Query\Component\ComponentInterface;
use Druid\Query\Component\SortInterface;

class Sort implements ComponentInterface, SortInterface
{
    /** @var string */
    private $sort;

    public function __construct($sort = null)
    {
        $this->sort = is_null($sort) ? self::SORT_LEXICOGRAPHIC : (string)$sort;
    }

    /**
     * @return string
     */
    public function getSort()
    {
        return (string)$this->sort;
    }

    /**
     * @param string $sort
     * @return $this
     */
    public function setSort($sort)
    {
        $this->sort = !$sort ? self::SORT_LEXICOGRAPHIC : (string)$sort;
        return $this;
    }
}
