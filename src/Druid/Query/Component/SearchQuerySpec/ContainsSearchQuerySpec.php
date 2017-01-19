<?php

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
