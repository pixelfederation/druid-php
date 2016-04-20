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

namespace Druid\Query\Common;

use Druid\Query\Common\Component\Datasource\DatasourceInterface;

/**
 * Interface Query
 *
 * @package Druid\Query\Common
 * @author  Tomas Mihalicka <tmihalicka@pixelfederation.com>
 */
interface QueryInterface
{
    /**
     * Get Query Type
     *
     * This String should always be always some from query types listed bellow;
     * this is the first thing Druid looks at to figure out how to interpret the query.
     *
     * - timeseries
     * - topN
     * - queryType
     * - timeBoundary
     * - segmentMetadata
     * - dataSourceMetadata
     * - search
     *
     * @return string
     */
    public function getQueryType();

    /**
     * Get Current Datasource
     *
     * @return DatasourceInterface
     */
    public function getDatasource();

    /**
     * Set Datasource
     *
     * @param DatasourceInterface $datasource
     *
     * @return QueryInterface
     */
    public function setDatasource(DatasourceInterface $datasource);
}
