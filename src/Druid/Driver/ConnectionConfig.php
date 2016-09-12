<?php

/*
 * Copyright (c) 2016 PIXEL FEDERATION, s.r.o.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the PIXEL FEDERATION, s.r.o. nor the
 *       names of its contributors may be used to endorse or promote products
 *       derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL PIXEL FEDERATION, s.r.o. BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

namespace Druid\Driver;

/**
 * Class ConnectionConfig.
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
        'proxy' => null,
        'timeout' => null,
    ];

    /**
     * @var array
     */
    private $config;

    /**
     * ConnectionConfig constructor.
     *
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

    /**
     * @return float
     */
    public function getTimeout()
    {
        return $this->config['timeout'];
    }
}
