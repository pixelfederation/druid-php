<?php

namespace Druid\Query\Component;

/**
 * Interface SearchQuerySpecInterface
 * @package Druid\Query\Component
 */
interface SearchQuerySpecInterface extends ComponentInterface
{
    const TYPE_INSENSITIVE_CONTAINS = 'insensitive_contains';
    const TYPE_FRAGMENT = 'fragment';
    const TYPE_CONTAINS = 'contains';
    const TYPE_REGEX = 'regex';
}
