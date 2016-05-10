<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Driver\Guzzle;

use Druid\Driver\ConnectionConfig;
use Druid\Driver\DriverInterface;
use GuzzleHttp\Client;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerBuilder;

class Driver implements DriverInterface
{
    /**
     * @param ConnectionConfig $config
     * @return Connection
     */
    public function connect(ConnectionConfig $config)
    {
        $serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
            ->build();

        $params = ['base_uri' => $config->getBaseUri()];
        if ($config->getProxy()) {
            $params['proxy'] = $config->getProxy();
        }

        return new Connection(new Client($params), $serializer);
    }
}
