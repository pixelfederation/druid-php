<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Aggregation;

use Druid\Query\AbstractQuery;
use Druid\Query\Component\CollectionInterface;
use Druid\Query\Component\DataSource\AbstractDataSource;
use Druid\Query\Component\LimitSpec\AbstractLimitSpec;
use Druid\Query\QueryInterface;

/**
 * Class GroupBy
 * @package Druid\Query\Aggregation
 */
class GroupBy extends AbstractQuery implements QueryInterface
{
    /**
     * @var AbstractDataSource
     */
    private $dataSource;

    /**
     * @var CollectionInterface
     */
    private $dimensions;

    /**
     * @var AbstractLimitSpec
     */
    private $limitSpec;

    public function __construct()
    {
        parent::__construct(self::TYPE_GROUP_BY);
    }

    /**
     * @return AbstractDataSource
     */
    public function getDataSource()
    {
        return $this->dataSource;
    }

    /**
     * @param AbstractDataSource $dataSource
     * @return $this
     */
    public function setDataSource($dataSource)
    {
        $this->dataSource = $dataSource;

        return $this;
    }

    /**
     * @return CollectionInterface
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param CollectionInterface $dimensions
     * @return $this
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    /**
     * @return AbstractLimitSpec
     */
    public function getLimitSpec()
    {
        return $this->limitSpec;
    }

    /**
     * @param AbstractLimitSpec $limitSpec
     * @return $this
     */
    public function setLimitSpec($limitSpec)
    {
        $this->limitSpec = $limitSpec;

        return $this;
    }
}
