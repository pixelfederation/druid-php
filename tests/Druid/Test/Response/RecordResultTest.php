<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Test\Response;

use Druid\Response\RecordResult;

/**
 * Class RecordResultTest
 * @package Druid\Test\Response
 * @covers \Druid\Response\RecordResult
 */
class RecordResultTest extends \PHPUnit_Framework_TestCase
{

    public function testGet()
    {
        $record = new RecordResult(['key' => 'value']);
        $this->assertEquals('value', $record->get('key'));
    }

    public function testGetDefault()
    {
        $record = new RecordResult([]);
        $this->assertEquals('default', $record->get('key', 'default'));
    }
}
