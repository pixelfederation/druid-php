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

namespace Druid\Query\Component\Factory;

use Druid\Query\Component\PostAggregator;

/**
 * Class PostAggregatorFactory.
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class PostAggregatorFactory
{
    /**
     * @param string $name
     * @param string $fn
     * @param array  $fields
     *
     * @return PostAggregator\ArithmeticPostAggregator
     */
    public function arithmeticPostAggregator($name, $fn, array $fields)
    {
        return new PostAggregator\ArithmeticPostAggregator($name, $fn, $fields);
    }

    /**
     * @param string    $name
     * @param int|float $value
     *
     * @return PostAggregator\ConstantPostAggregator
     */
    public function constantPostAggregator($name, $value)
    {
        return new PostAggregator\ConstantPostAggregator($name, $value);
    }

    /**
     * @param string $name
     * @param string $fieldName
     *
     * @return PostAggregator\FieldAccessPostAggregator
     */
    public function fieldAccessPostAggregator($name, $fieldName)
    {
        return new PostAggregator\FieldAccessPostAggregator($name, $fieldName);
    }
}
