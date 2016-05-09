<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\QueryBuilder;

use Druid\Query\Aggregation\GroupBy;
use Druid\Query\Component\DataSource\TableDataSource;
use Druid\Query\Component\Granularity\PeriodGranularity;
use Druid\Query\Component\Interval\Interval;

/**
 * Class GroupByQueryBuilder
 * @package Druid\QueryBuilder
 */
class GroupByQueryBuilder extends AbstractQueryBuilder
{
    protected $components = [
        'dataSource' => null,
        'dimensions' => [],
        'limitSpec' => null,
        'having' => null,
        'granularity' => null,
        'filter' => null,
        'aggregations' => [],
        'postAggregations' => [],
        'intervals' => []
    ];


    /**
     * @param string $dataSource
     * @return $this
     */
    public function setDataSource($dataSource)
    {
        $this->addComponent('dataSource', new TableDataSource($dataSource));

        return $this;
    }

    /**
     * @param string $period
     * @param string $timeZone
     * @return $this
     */
    public function setGranularity($period, $timeZone = 'UTC')
    {
        $this->addComponent('granularity', new PeriodGranularity($period, $timeZone));

        return $this;
    }

    /**
     * @param \DateTime $start
     * @param \DateTime $end
     * @return $this
     */
    public function addInterval(\DateTime $start, \DateTime $end)
    {
        $this->addComponent('intervals', new Interval($start, $end));

        return $this;
    }

    /**
     * @return GroupBy
     */
    public function getQuery()
    {
        $query = new GroupBy();
        foreach ($this->components as $componentName => $component) {
            if (!empty($component)) {
                $method = 'set' . ucfirst($componentName);
                $query->$method($component);
            }
        }
        return $query;
    }
}