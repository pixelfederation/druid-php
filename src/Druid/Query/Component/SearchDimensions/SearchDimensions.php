<?php

namespace Druid\Query\Component\SearchDimensions;

use Druid\Query\Component\ComponentInterface;
use Druid\Query\Component\StringCollectionInterface;

class SearchDimensions implements ComponentInterface, StringCollectionInterface
{

    /** @var array|string[] */
    private $collection = [];

    /**
     * @param array|string[] $collection
     */
    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param array|string[] $collection
     *
     * @return $this
     */
    public function set(array $collection)
    {
        $this->collection = $collection;
        return $this;
    }

    /**
     * @param string $entry
     *
     * @return $this
     */
    public function add($entry)
    {
        $this->collection[] = $entry;
        return $this;
    }

    /**
     * @return string[]
     */
    public function get()
    {
        return array_map(function ($entry) {
            return (string)$entry;
        }, $this->collection);
    }
}
