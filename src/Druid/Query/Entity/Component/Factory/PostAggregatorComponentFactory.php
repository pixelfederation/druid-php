<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Factory;

use Druid\Query\Common\Component\Factory\ComponentFactoryInterface;
use Druid\Query\Common\Component\PostAggregation\PostAggregatorCollectionInterface;
use Druid\Query\Entity\Component\PostAggregation\ArithmeticPostAggregator;
use Druid\Query\Entity\Component\PostAggregation\ConstantPostAggregator;
use Druid\Query\Entity\Component\PostAggregation\FieldAccessPostAggregator;

/**
 * Class PostAggregatorComponentFactory
 * @package Druid\Query\Entity\Component\Factory
 */
class PostAggregatorComponentFactory extends AbstractComponentFactory implements ComponentFactoryInterface
{
    const TYPE_POST_AGG = 'postAgg';

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return self::TYPE_POST_AGG;
    }

    /**
     * @param string $name
     * @param string $func
     * @param PostAggregatorCollectionInterface $fields
     * @return ArithmeticPostAggregator
     */
    protected function createArithmetic($name, $func, $fields)
    {
        return new ArithmeticPostAggregator($name, $func, $fields);
    }

    /**
     * @param string $name
     * @param string $fieldName
     * @return FieldAccessPostAggregator
     */
    protected function createFieldAccess($name, $fieldName)
    {
        return new FieldAccessPostAggregator($name, $fieldName);
    }

    /**
     * @param string $name
     * @param int|float $value
     * @return ConstantPostAggregator
     */
    protected function createConstant($name, $value)
    {
        return new ConstantPostAggregator($name, $value);
    }
}
