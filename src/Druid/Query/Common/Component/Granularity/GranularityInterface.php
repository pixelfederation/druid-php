<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\Granularity;

use Druid\Query\Common\ComponentInterface;

/**
 * Interface GranularityInterface
 * @package Druid\Query\Common\Component\Granularity
 */
interface GranularityInterface extends ComponentInterface
{
    const TYPE_PERIOD = 'period';

    public function getType();
}
