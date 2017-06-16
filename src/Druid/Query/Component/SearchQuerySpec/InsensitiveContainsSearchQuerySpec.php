<?php

namespace Druid\Query\Component\SearchQuerySpec;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\SearchQuerySpecInterface;
use Druid\Query\Component\ValuedInterface;

/**
 * Class InsensitiveContainsSearchQuerySpec
 * @package Druid\Query\Component\SearchQuerySpec
 */
class InsensitiveContainsSearchQuerySpec extends AbstractTypedComponent implements
    SearchQuerySpecInterface,
    ValuedInterface
{
    /** @var string */
    private $value;

    public function __construct($value = '')
    {
        parent::__construct(self::TYPE_INSENSITIVE_CONTAINS);
        $this->setValue($value);
    }

    /**
     * @param string $value
     * @return InsensitiveContainsSearchQuerySpec
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
}
