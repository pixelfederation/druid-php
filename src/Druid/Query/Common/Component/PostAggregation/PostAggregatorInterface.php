<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\PostAggregation;

use Druid\Query\Common\ComponentInterface;

/**
 * Interface PostAggregatorInterface
 * @package Druid\Query\Common\Component\PostAggregation
 */
interface PostAggregatorInterface extends ComponentInterface
{

    const ARITHMETIC_TYPE = 'arithmetic';
    const CONSTANT_TYPE = 'constant';
    const FIELD_ACCESS_TYPE = 'fieldAccess';

    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getName();
}
