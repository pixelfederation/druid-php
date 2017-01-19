<?php

namespace Druid\Query\Component;

/**
 * Interface ValuedInterface
 * @package Druid\Query\Component
 */
interface ValuedInterface
{
    public function getValue();

    public function setValue($value);
}
