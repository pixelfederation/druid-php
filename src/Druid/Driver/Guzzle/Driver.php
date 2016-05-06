<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Driver\Guzzle;

use Druid\DriverInterface;
use GuzzleHttp\Client;
use JMS\Serializer\SerializerBuilder;

class Driver implements DriverInterface
{
    public function connect()
    {
        $serializer = SerializerBuilder::create()->build();
        return new Connection(new Client(), $serializer);
    }

}