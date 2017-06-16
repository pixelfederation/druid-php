<?php

namespace Druid\Query\Component\SearchLimit;

use Druid\Query\Component\ComponentInterface;
use Druid\Query\Component\LimitInterface;

class SearchLimit implements ComponentInterface, LimitInterface
{

    /** @var int */
    private $limit;

    public function __construct($limit)
    {
        $this->setLimit($limit);
    }

    /**
     * @param int $limit
     */
    public function setLimit($limit)
    {
        $this->limit = (int)$limit;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return (int)$this->limit;
    }
}
