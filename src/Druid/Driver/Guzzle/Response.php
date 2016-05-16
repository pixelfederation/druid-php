<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Driver\Guzzle;

use Druid\Driver\ResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

/**
 * Class Response
 * @package Druid\Driver\Guzzle
 */
class Response implements ResponseInterface
{

    /**
     * @var PsrResponseInterface
     */
    private $originalResponse;

    private $decodedBody;

    /**
     * Response constructor.
     * @param PsrResponseInterface $originalResponse
     */
    public function __construct(PsrResponseInterface $originalResponse)
    {
        $this->originalResponse = $originalResponse;
    }

    /**
     * @inheritdoc
     */
    public function getRecords()
    {
        if (!$this->decodedBody) {
            $decodedRawBody = \json_decode($this->originalResponse->getBody(), true);
            $this->decodedBody = \array_map(function ($item) {
                $record = [
                    'timestamp' => $item['timestamp']
                ];

                if (isset($item['event'])) {
                    $record = array_merge($record, $item['event']);
                }

                if (isset($item['result'])) {
                    $record = array_merge($record, $item['result']);
                }

                return $record;
            }, $decodedRawBody);
        }

        return $this->decodedBody;
    }
}
