<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component\DataSource;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\DataSourceInterface;
use Druid\Query\Component\NamedInterface;

/**
 * Class TableDataSource.
 */
class TableDataSource extends AbstractTypedComponent implements DataSourceInterface, NamedInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * Table constructor.
     *
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
