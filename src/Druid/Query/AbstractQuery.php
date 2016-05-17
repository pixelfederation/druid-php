<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query;

/**
 * Class AbstractQuery.
 */
abstract class AbstractQuery
{
    const TYPE_GROUP_BY = 'groupBy';

    /**
     * @var string
     */
    private $queryType;

    /**
     * AbstractQuery constructor.
     *
     * @param string $queryType
     */
    public function __construct($queryType)
    {
        $this->queryType = $queryType;
    }

    /**
     * @return string
     */
    public function getQueryType()
    {
        return $this->queryType;
    }
}
