<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Common;

use Druid\Response\Record;

/**
 * Interface RecordFactoryInterface
 * @package Druid\Common
 */
interface RecordFactoryInterface
{

    /**
     * @param array $item
     * @return Record
     */
    public function create(array $item);
}
