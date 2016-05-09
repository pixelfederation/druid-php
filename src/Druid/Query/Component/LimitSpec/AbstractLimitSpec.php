<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\LimitSpec;

use Druid\Query\Component\TypedInterface;

/**
 * Class AbstractLimitSpec
 * @package Druid\Query\Component\LimitSpec
 */
class AbstractLimitSpec
{
    const TYPE_DEFAULT = 'default';

    /**
     * @var string
     */
    private $type;

    /**
     * AbstractLimitSpec constructor.
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
