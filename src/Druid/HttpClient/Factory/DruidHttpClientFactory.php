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
namespace Druid\HttpClient\Factory;

use Druid\Config\Config;
use Druid\Exceptions\DruidDriverHttpClientCreationException;
use Druid\HttpClient\Common\ClientInterface;
use Druid\HttpClient\Curl\DruidCurlHttpClient;
use Druid\HttpClient\Guzzle\DruidGuzzleHttpClient;

/**
 * Class HttpClientFactory
 *
 * This factory crates new instance of Druid HTTP client,
 * every client must inherit ClientInterface
 *
 * @package Druid\HttpClient\Factory
 */
class DruidHttpClientFactory
{
    /**
     * Connection Configuration
     *
     * @var Config
     */
    private $config;

    /**
     * HttpClientFactory constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = new Config($config);
    }

    /**
     * Get Druid Http Client
     *
     * @return ClientInterface
     *
     * @throws DruidDriverHttpClientCreationException
     */
    public function getDruidHttpClient()
    {
        if (class_exists('GuzzleHttp\Client')) {
            return new DruidGuzzleHttpClient($this->config);
        }

        if (extension_loaded('curl')) {
            return new DruidCurlHttpClient($this->config);
        }

        throw new DruidDriverHttpClientCreationException(
            'Unable to create Druid HTTP client, only CURL and Guzzle Clients are supported.'
        );
    }
}
