<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Factory;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Druid\DruidRequest;
use Druid\Query\Common\QueryInterface;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerBuilder;

class DruiRequestFactory
{
    /**
     * @param QueryInterface $query
     * @return DruidRequest
     */
    public function create(QueryInterface $query)
    {
        $serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
            ->build();

        return new DruidRequest($query, $serializer);
    }
}
