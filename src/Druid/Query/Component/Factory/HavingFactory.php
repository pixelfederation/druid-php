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

use Druid\Query\Component\Having\LogicalHaving;
use Druid\Query\Component\Having\NumericHaving;
use Druid\Query\Component\HavingInterface;

/**
 * Class HavingFactory.
 */
class HavingFactory
{
    /**
     * @param string    $aggregation
     * @param int|float $value
     *
     * @return NumericHaving
     */
    public function equalToHaving($aggregation, $value)
    {
        return $this->numericHaving(HavingInterface::TYPE_NUMERIC_EQUAL_TO, $aggregation, $value);
    }

    /**
     * @param string    $aggregation
     * @param int|float $value
     *
     * @return NumericHaving
     */
    public function greaterThanHaving($aggregation, $value)
    {
        return $this->numericHaving(HavingInterface::TYPE_NUMERIC_GREATER_THAN, $aggregation, $value);
    }

    /**
     * @param string    $aggregation
     * @param int|float $value
     *
     * @return NumericHaving
     */
    public function lessThanHaving($aggregation, $value)
    {
        return $this->numericHaving(HavingInterface::TYPE_NUMERIC_LESS_THAN, $aggregation, $value);
    }

    /**
     * @param array|HavingInterface[] $havingSpecs
     *
     * @return LogicalHaving
     */
    public function andHaving(array $havingSpecs)
    {
        return $this->logicalHaving(HavingInterface::TYPE_LOGICAL_AND, $havingSpecs);
    }

    /**
     * @param array $havingSpecs
     *
     * @return LogicalHaving
     */
    public function orHaving(array $havingSpecs)
    {
        return $this->logicalHaving(HavingInterface::TYPE_LOGICAL_OR, $havingSpecs);
    }

    /**
     * @param string    $type
     * @param string    $aggregation
     * @param int|float $value
     *
     * @return NumericHaving
     */
    public function numericHaving($type, $aggregation, $value)
    {
        return new NumericHaving($type, $aggregation, $value);
    }

    /**
     * @param string $type
     * @param array  $havingSpecs
     *
     * @return LogicalHaving
     */
    public function logicalHaving($type, array $havingSpecs)
    {
        return new LogicalHaving($type, $havingSpecs);
    }
}
