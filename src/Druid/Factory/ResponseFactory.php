<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Factory;

use Druid\DruidResponse;

/**
 * Class ResponseFactory
 * @package Druid\Factory
 */
class ResponseFactory
{

    const GROUP_BY_TYPE = 'groupBy';

    /**
     * @param array $items
     * @param string $type
     * @return DruidResponse
     */
    public function create(array $items, $type)
    {
        switch ($type) {
            case self::GROUP_BY_TYPE:
                $recordsFactory = new GroupByRecordFactory();
                break;
            default:
                throw new \RuntimeException(
                    sprintf('Could not instantiate record factory for type %s', $type)
                );
        }

        return new DruidResponse($items, $recordsFactory);
    }
}
