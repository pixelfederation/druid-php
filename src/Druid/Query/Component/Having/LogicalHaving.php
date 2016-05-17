<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component\Having;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\HavingInterface;

/**
 * Class LogicalHaving.
 */
class LogicalHaving extends AbstractTypedComponent implements HavingInterface
{
    /**
     * @var array|HavingInterface[]
     */
    private $havingSpecs;

    /**
     * LogicalHaving constructor.
     *
     * @param string                                         $type
     * @param array|\Druid\Query\Component\HavingInterface[] $havingSpecs
     */
    public function __construct($type, array $havingSpecs)
    {
        parent::__construct($type);
        $this->havingSpecs = $havingSpecs;
    }

    /**
     * @return array|\Druid\Query\Component\HavingInterface[]
     */
    public function getHavingSpecs()
    {
        return $this->havingSpecs;
    }
}
