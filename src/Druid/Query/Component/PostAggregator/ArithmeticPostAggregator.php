<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component\PostAggregator;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\PostAggregatorInterface;

/**
 * Class ArithmeticPostAggregator.
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class ArithmeticPostAggregator extends AbstractTypedComponent implements PostAggregatorInterface
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $fn;

    /**
     * @var PostAggregatorInterface[]|array
     */
    private $fields;

    /**
     * ArithmeticPostAggregator constructor.
     *
     * @param string                                                 $name
     * @param string                                                 $fn
     * @param array|\Druid\Query\Component\PostAggregatorInterface[] $fields
     */
    public function __construct($name, $fn, array $fields)
    {
        parent::__construct(self::TYPE_ARITHMETIC);
        $this->name = $name;
        $this->fn = $fn;
        $this->fields = $fields;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFn()
    {
        return $this->fn;
    }

    /**
     * @return array|\Druid\Query\Component\PostAggregatorInterface[]
     */
    public function getFields()
    {
        return $this->fields;
    }
}
