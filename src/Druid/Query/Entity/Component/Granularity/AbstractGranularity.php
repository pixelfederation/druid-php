<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Granularity;

use Druid\Query\Common\Component\Granularity\GranularityInterface;

abstract class AbstractGranularity implements GranularityInterface
{
    /**
     * @var string
     */
    protected $type;

    /**
     * AbstractGranularity constructor.
     * @param string $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
