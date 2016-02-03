<?php
/**
 * Copyright (c) 2016 PIXEL FEDERATION, s.r.o.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *  * Redistributions of source code must retain the above copyright
 * notice, this list of conditions and the following disclaimer.
 *  * Redistributions in binary form must reproduce the above copyright
 * notice, this list of conditions and the following disclaimer in the
 * documentation and/or other materials provided with the distribution.
 *  * Neither the name of the PIXEL FEDERATION, s.r.o. nor the
 * names of its contributors may be used to endorse or promote products
 * derived from this software without specific prior written permission.
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
namespace Druid\Config;

/**
 * Class Config
 *
 * @package Druid\Config
 */
final class Config
{
    /**
     * Druid Default Protocol
     *
     * @const string
     */
    const DEFAULT_PROTOCOL = 'http';

    /**
     * Druid Default Hostname
     *
     * @const string
     */
    const DEFAULT_HOST = 'localhost';

    /**
     * Druid Default Port
     *
     * @const int
     */
    const DEFAULT_PORT = 8084;

    /**
     * Druid Default Api Version
     *
     * @const string
     */
    const DEFAULT_API_VERSION = 'v2';

    /**
     * Current Array Config
     *
     * @var array
     */
    private $config;

    /**
     * Config constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Get Druid Protocol
     *
     * @return string
     */
    public function getProtocol()
    {
        return isset($this->config['protocol']) ? $this->config['protocol'] : self::DEFAULT_PROTOCOL;
    }

    /**
     * Get Druid Host
     *
     * @return string
     */
    public function getHost()
    {
        return isset($this->config['host']) ? $this->config['host'] : self::DEFAULT_HOST;
    }

    /**
     * Get Druid Port
     *
     * @return int
     */
    public function getPort()
    {
        return isset($this->config['port']) ? $this->config['port'] : self::DEFAULT_PORT;
    }

    /**
     * Get Druid Api Version
     *
     * @return string
     */
    public function getApiVersion()
    {
        return isset($this->config['api_version']) ? $this->config['api_version'] : self::DEFAULT_API_VERSION;
    }
}
