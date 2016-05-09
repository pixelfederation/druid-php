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
}
