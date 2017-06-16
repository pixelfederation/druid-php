<?php

namespace Druid\Query\Component\SearchQuerySpec;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\SearchQuerySpecInterface;

/**
 * Class RegexSearchQuerySpec
 * @package Druid\Query\Component\SearchQuerySpec
 */
class RegexSearchQuerySpec extends AbstractTypedComponent implements SearchQuerySpecInterface
{
    /** @var string */
    private $pattern;

    /**
     * RegexSearchQuerySpec constructor.
     * @param string $pattern
     */
    public function __construct($pattern = '')
    {
        parent::__construct(self::TYPE_REGEX);
        $this->setPattern($pattern);
    }

    /**
     * @param string $pattern
     * @return RegexSearchQuerySpec
     */
    public function setPattern($pattern)
    {
        $this->pattern = (string)$pattern;
        return $this;
    }

    /**
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }
}
