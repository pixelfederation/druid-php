<?php

namespace Druid\Query\Entity\Component\DataSource;

use Druid\Query\Common\Component\DataSource\DataSourceInterface;

class DataSource implements DataSourceInterface
{
    /**
     * @var string
     */
    private $dataSource;

    /**
     * DataSource constructor.
     *
     * @param string $dataSource
     */
    public function __construct($dataSource)
    {
        $this->dataSource = $dataSource;
    }

    /**
     * @return string
     */
    public function getDataSource()
    {
        return $this->dataSource;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getDataSource();
    }
}
