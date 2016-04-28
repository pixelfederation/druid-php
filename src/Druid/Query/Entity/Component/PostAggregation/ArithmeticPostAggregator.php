<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\PostAggregation;

use Druid\Query\Common\Component\PostAggregation\ArithmeticPostAggregatorInterface;
use Druid\Query\Common\Component\PostAggregation\PostAggregatorCollectionInterface;

/**
 * Class ArithmeticPostAggregator
 * @package Druid\Query\Entity\Component\PostAggregation
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class ArithmeticPostAggregator extends AbstractPostAggregator implements ArithmeticPostAggregatorInterface
{
    /**
     * @var string
     */
    private $fn;
    /**
     * @var PostAggregatorCollectionInterface
     */
    private $fields;

    /**
     * @var null|int
     */
    private $ordering;

    /**
     * ArithmeticPostAggregator constructor.
     * @param string $name
     * @param string $fn
     * @param PostAggregatorCollectionInterface $fields
     */
    public function __construct($name, $fn, PostAggregatorCollectionInterface $fields)
    {
        parent::__construct(self::ARITHMETIC_TYPE, $name);
        $this->fn = $fn;
        $this->fields = $fields;
    }


    /**
     * @return string
     */
    public function getFn()
    {
        return $this->fn;
    }

    /**
     * @return PostAggregatorCollectionInterface
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @return int|null
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * @param int|null $ordering
     * @return ArithmeticPostAggregator
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;

        return $this;
    }
}
