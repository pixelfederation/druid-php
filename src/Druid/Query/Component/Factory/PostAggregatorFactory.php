<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component\Factory;

use Druid\Query\Component\PostAggregator;

/**
 * Class PostAggregatorFactory.
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class PostAggregatorFactory
{
    /**
     * @param string $name
     * @param string $fn
     * @param array  $fields
     *
     * @return PostAggregator\ArithmeticPostAggregator
     */
    public function arithmeticPostAggregator($name, $fn, array $fields)
    {
        return new PostAggregator\ArithmeticPostAggregator($name, $fn, $fields);
    }

    /**
     * @param string    $name
     * @param int|float $value
     *
     * @return PostAggregator\ConstantPostAggregator
     */
    public function constantPostAggregator($name, $value)
    {
        return new PostAggregator\ConstantPostAggregator($name, $value);
    }

    /**
     * @param string $name
     * @param string $fieldName
     *
     * @return PostAggregator\FieldAccessPostAggregator
     */
    public function fieldAccessPostAggregator($name, $fieldName)
    {
        return new PostAggregator\FieldAccessPostAggregator($name, $fieldName);
    }
}
