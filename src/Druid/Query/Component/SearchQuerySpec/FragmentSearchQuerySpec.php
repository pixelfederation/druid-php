<?php

namespace Druid\Query\Component\SearchQuerySpec;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\CasedInterface;
use Druid\Query\Component\SearchQuerySpecInterface;
use Druid\Query\Component\ValuedInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class FragmentSearchQuerySpec
 * @package Druid\Query\Component\SearchQuerySpec
 */
class FragmentSearchQuerySpec extends AbstractTypedComponent implements
    SearchQuerySpecInterface,
    ValuedInterface,
    CasedInterface
{
    /**
     * @var array
     * @Serializer\Type("array<string>")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    private $values;

    /**
     * @var bool
     * @Serializer\SerializedName("case_sensitive")
     */
    private $caseSensitive;

    public function __construct(array $values, $case = self::CASE_INSENSITIVE)
    {
        parent::__construct(self::TYPE_FRAGMENT);
        $this->setValue($values);
        $this->setCaseSensitive($case);
    }

    /**
     * @param mixed $value
     * @return FragmentSearchQuerySpec
     */
    public function setValue($value)
    {
        return $this->setValues((array)$value);
    }

    /**
     * @return array
     */
    public function getValue()
    {
        return $this->values;
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

    /**
     * @param array $values
     * @return FragmentSearchQuerySpec
     */
    public function setValues(array $values)
    {
        $this->values = $values;
        return $this;
    }
}
