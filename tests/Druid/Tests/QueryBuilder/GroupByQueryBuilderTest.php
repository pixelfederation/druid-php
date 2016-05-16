<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Tests\QueryBuilder;

use Druid\Query\Component\ComponentInterface;
use Druid\QueryBuilder\GroupByQueryBuilder;

class GroupByQueryBuilderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testFailAddComponent()
    {
        $builder = new GroupByQueryBuilder();
        $component = $this->getMock(ComponentInterface::class);
        $builder->addComponent('not_exists_component', $component);
    }

    public function testSettersAndGetters()
    {
        $builder = new GroupByQueryBuilder();

        $now = new \DateTime();
        $builder->setDataSource('dataSource')
            ->setGranularity('P1D')
            ->setFilter($builder->filter()->selectorFilter('gender', 'male'))
            ->addInterval($now, new \DateTime())
            ->addAggregator($builder->aggregator()->doubleSum('sum', 'sum'))
            ->addAggregator($builder->aggregator()->count('count'))
            ->addDimension('gender', 'gender')
            ->addPostAggregator($builder->postAggregator()->arithmeticPostAggregator('average', '/', [
                $builder->postAggregator()->fieldAccessPostAggregator('sum', 'sum'),
                $builder->postAggregator()->fieldAccessPostAggregator('count', 'count'),
            ]))
            ->setHaving($builder->having()->equalToHaving('gender', 300))
        ;

        $query = $builder->getQuery();

        $this->assertEquals('dataSource', $query->getDataSource()->getName());
        $this->assertEquals('gender', $query->getFilter()->getDimension());
        $this->assertEquals('male', $query->getFilter()->getValue());
        $this->assertEquals($now->format('Y-m-d\TH:i:s\Z'), $query->getIntervals()[0]->getStart());
        $this->assertEquals('sum', $query->getAggregations()[0]->getName());
        $this->assertEquals('count', $query->getAggregations()[1]->getName());
        $this->assertEquals('gender', $query->getDimensions()[0]->getDimension());
        $this->assertEquals('average', $query->getPostAggregations()[0]->getName());
        $this->assertEquals(300, $query->getHaving()->getValue());

    }
}
