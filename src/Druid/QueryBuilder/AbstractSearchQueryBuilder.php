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

namespace Druid\QueryBuilder;

use Druid\Query\Component\SearchDimensions\SearchDimensions;
use Druid\Query\Component\SearchLimit\SearchLimit;
use Druid\Query\Component\SearchQuerySpec\InsensitiveContainsSearchQuerySpec;
use Druid\Query\Component\SearchQuerySpecInterface;
use Druid\Query\Component\Sort\Sort;
use Druid\Query\Search\Search;

/**
 * Class AbstractSearchQueryBuilder.
 */
abstract class AbstractSearchQueryBuilder extends AbstractQueryBuilder
{
    protected $components = [
        'dataSource' => null,
        'granularity' => null,
        'filter' => null,
        'limit' => null,
        'intervals' => [],
        'searchDimensions' => null,
        'query' => null,
        'sort' => null,
    ];

    /**
     * @param int|SearchLimit $limit
     *
     * @return $this
     */
    public function setLimit($limit)
    {
        return $this->addComponent(
            'limit',
            $limit instanceof SearchLimit ? $limit : new SearchLimit($limit)
        );
    }

    /**
     * @param SearchDimensions|array $dimensions
     *
     * @return $this
     */
    public function setSearchDimensions($dimensions)
    {
        return $this->addComponent(
            'searchDimensions',
            $dimensions instanceof SearchDimensions ? $dimensions : new SearchDimensions($dimensions)
        );
    }

    /**
     * @param SearchQuerySpecInterface|string $searchQuery
     *
     * @return $this
     */
    public function setQuery($searchQuery)
    {
        return $this->addComponent(
            'query',
            $searchQuery instanceof SearchQuerySpecInterface
                ? $searchQuery
                : new InsensitiveContainsSearchQuerySpec($searchQuery)
        );
    }

    /**
     * @param Sort|string $sort
     *
     * @return $this
     */
    public function setSort($sort)
    {
        return $this->addComponent(
            'sort',
            $sort instanceof Sort ? $sort : new Sort($sort)
        );
    }

    /**
     * @return Search
     */
    public function getQuery()
    {
        $query = new Search();
        foreach ($this->components as $componentName => $component) {
            if (!empty($component)) {
                $method = 'set' . ucfirst($componentName);
                $query->$method($component);
            }
        }

        return $query;
    }
}
