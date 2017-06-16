<?php

namespace Druid\Query\Component;

/**
 * Interface CasedInterface
 * @package Druid\Query\Component
 */
interface CasedInterface
{
    const CASE_SENSITIVE = true;
    const CASE_INSENSITIVE = false;

    /**
     * @return bool
     */
    public function isCaseSensitive();
}
