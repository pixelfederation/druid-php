<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Factory;

use Druid\Common\RecordFactoryInterface;
use Druid\Response\Record;
use Druid\Response\RecordResult;

/**
 * Class GroupByRecordFactory
 * @package Druid\Factory
 */
class GroupByRecordFactory implements RecordFactoryInterface
{

    /**
     * @param array $item
     * @return Record
     */
    public function create(array $item)
    {
        return new Record($item['timestamp'], new RecordResult($item['event']));
    }
}
