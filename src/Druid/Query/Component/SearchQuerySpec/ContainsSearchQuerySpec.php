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

namespace Druid\Query\Component\SearchQuerySpec;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\CasedInterface;
use Druid\Query\Component\SearchQuerySpecInterface;
use Druid\Query\Component\ValuedInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class ContainsSearchQuerySpec
 */
class ContainsSearchQuerySpec extends AbstractTypedComponent implements
    SearchQuerySpecInterface,
    ValuedInterface,
    CasedInterface
{
    /** @var string */
    private $value;

    /**
     * @var bool
     * @Serializer\SerializedName(value="case_sensitive")
     */
    private $caseSensitive;

    public function __construct($value, $case = self::CASE_INSENSITIVE)
    {
        parent::__construct(self::TYPE_FRAGMENT);
        $this->setValue($value);
        $this->setCaseSensitive($case);
    }

    /**
     * @param string $value
     * @return ContainsSearchQuerySpec
     */
    public function setValue($value)
    {
        $this->value = (string)$value;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCaseSensitive()
    {
        return $this->caseSensitive;
    }

    /**
     * @param boolean $caseSensitive
     * @return FragmentSearchQuerySpec
     */
    public function setCaseSensitive($caseSensitive)
    {
        $this->caseSensitive = (bool)$caseSensitive;
        return $this;
    }
}
