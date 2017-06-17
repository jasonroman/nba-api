<?php

namespace JasonRoman\NbaApi\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Custom Regex constraint based on Symfony constraint.
 *
 * @Annotation
 */
class ApiRegex extends Constraint
{
    /**
     * @var string
     */
    public $message = "Param '{{ param }}' must match the following regex format: '{{ regex }}'.";

    /**
     * @var array
     */
    public $pattern;

    /**
     * {@inheritdoc}
     */
    public function getDefaultOption()
    {
        return 'pattern';
    }

    /**
     * {@inheritdoc}
     */
    public function getRequiredOptions()
    {
        return array('pattern');
    }
}