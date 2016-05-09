<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Driver\Guzzle;

use Druid\Driver\DriverInterface;
use GuzzleHttp\Client;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerBuilder;

class Driver implements DriverInterface
{
    /**
     * @param array $params
     * @return Connection
     */
    public function connect(array $params)
    {
        if (!isset($params['base_uri']) || empty($params['base_uri'])) {
            throw new \InvalidArgumentException(
                sprintf('Required param %s missing', 'base_uri')
            );
        }

        $serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
            ->build();
        return new Connection(new Client($params), $serializer);
    }
}
