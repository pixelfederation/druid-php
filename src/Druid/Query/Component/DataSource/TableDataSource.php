<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\DataSource;

use Druid\Query\Component\NamedInterface;
use Druid\Query\Component\TypedInterface;

class TableDataSource extends AbstractDataSource implements NamedInterface, TypedInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * Table constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct(self::TYPE_TABLE);

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}