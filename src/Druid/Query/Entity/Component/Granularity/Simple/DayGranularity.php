<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Granularity\Simple;

use Druid\Query\Entity\Component\Granularity\AbstractGranularity;

class DayGranularity extends AbstractGranularity
{
    protected static $granularity = 'day';
}
