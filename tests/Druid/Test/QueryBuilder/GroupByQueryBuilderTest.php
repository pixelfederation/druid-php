<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test\QueryBuilder;

use Druid\Query\Common\Aggregation\GroupByInterface;
use Druid\Query\Common\Component\DataSource\DataSourceInterface;
use Druid\Query\Common\Component\Granularity\GranularityInterface;
use Druid\QueryBuilder\AbstractQueryBuilder;
use Druid\QueryBuilder\GroupByQueryBuilder;

/**
 * Class GroupByQueryBuilderTest
 * @package Druid\Test\QueryBuilder
 * @covers \Druid\QueryBuilder\GroupByQueryBuilder
 * @covers \Druid\QueryBuilder\AbstractQueryBuilder
 */
class GroupByQueryBuilderTest extends \PHPUnit_Framework_TestCase
{

    public function testGetQuery()
    {
        $queryBuilder = new GroupByQueryBuilder();
        $query = $queryBuilder
            ->setDataSource('datasource')
            ->addInterval('2016-05-02', '2016-05-02')
            ->setGranularity($queryBuilder->expr()->dayGranularity())
            ->addAggregator($queryBuilder->expr()->standardAggregator('sum', 'name', 'fieldName'))
            ->addPostAggregator($queryBuilder->expr()->constantPostAggregator('name', 1000))
            ->addDimension('dimension')
            ->getQuery();


        $this->assertInstanceOf(GroupByInterface::class, $query);
        $this->assertInstanceOf(
            GranularityInterface::class,
            $queryBuilder->get(AbstractQueryBuilder::GRANULARITY_PART)[0]
        );

        /** @var DataSourceInterface $dataSource */
        $dataSource = $queryBuilder->get(AbstractQueryBuilder::DATA_SOURCE_PART)[0];

        $this->assertEquals('datasource', $dataSource->getDataSource());
    }

    public function testRemove()
    {
        $queryBuilder = new GroupByQueryBuilder();
        $queryBuilder
            ->setDataSource('datasource');

        $this->assertInstanceOf(
            DataSourceInterface::class,
            $queryBuilder->get(AbstractQueryBuilder::DATA_SOURCE_PART)[0]
        );

        $queryBuilder->remove(AbstractQueryBuilder::DATA_SOURCE_PART);
        $this->assertEmpty($queryBuilder->get(AbstractQueryBuilder::DATA_SOURCE_PART));
    }
}
