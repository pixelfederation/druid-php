<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Driver;

/**
 * Class ConnectionConfig
 * @package Druid\Driver
 */
class ConnectionConfig
{
    /**
     * @var array
     */
    private $defaults = [
        'scheme' => 'http',
        'host' => 'localhost',
        'port' => '8084',
        'path' => '/druid/v2',
        'proxy' => null
    ];

    /**
     * @var array
     */
    private $config;

    /**
     * ConnectionConfig constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = \array_merge($this->defaults, $config);
    }

    /**
     * @return string
     */
    public function getBaseUri()
    {
        return sprintf(
            '%s://%s:%d%s',
            $this->getScheme(),
            $this->getHost(),
            $this->getPort(),
            $this->getPath()
        );
    }

    /**
     * @return string
     */
    public function getScheme()
    {
        return $this->config['scheme'];
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->config['host'];
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->config['port'];
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->config['path'];
    }

    /**
     * @return string
     */
    public function getProxy()
    {
        return $this->config['proxy'];
    }
}
