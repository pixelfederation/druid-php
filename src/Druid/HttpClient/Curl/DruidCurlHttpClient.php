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
namespace Druid\HttpClient\Curl;

use Druid\Config\Config;
use Druid\DruidRequest;
use Druid\HttpClient\AbstractDruidClient;

/**
 * Class DruidCurlHttpClient
 *
 * @package Druid\HttpClient\Curl
 * @author  Tomas Mihalicka <tmihalicka@pixelfederation.com>
 */
final class DruidCurlHttpClient extends AbstractDruidClient
{
    /**
     * Druid Curl
     *
     * @var DruidCurl
     */
    private $druidCurl;

    /**
     * DruidCurlHttpClient constructor.
     *
     * @param Config         $config
     * @param DruidCurl|null $druidCurl
     */
    public function __construct(Config $config, DruidCurl $druidCurl = null)
    {
        $this->druidCurl = $druidCurl ?: new DruidCurl();

        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function send(DruidRequest $request)
    {
        // TODO: Implement send() method.
    }

    /**
     * @inheritDoc
     */
    public function closeConnection()
    {
        $this->druidCurl->close();
    }
}
