<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Tests\Driver\Guzzle;

use Druid\Driver\Guzzle\Connection;
use Druid\Query\QueryInterface;
use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;

class ConnectionTest extends \PHPUnit_Framework_TestCase
{
    public function testSend()
    {
        $guzzleMock = $this->getMockBuilder(Client::class)->setMethods(['post'])->getMock();
        $guzzleMock->expects($this->once())->method('post');

        $serializerMock = $this->getMockBuilder(SerializerInterface::class)->setMethods(['serialize', 'deserialize'])->getMock();
        $serializerMock->expects($this->once())->method('serialize');

        $connection = new Connection($guzzleMock, $serializerMock);

        $queryMock = $this->getMock(QueryInterface::class);
        $connection->send($queryMock);
    }
}
