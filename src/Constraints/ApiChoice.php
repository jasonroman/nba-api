<?php

namespace JasonRoman\NbaApi\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Custom Choice constraint based on Symfony constraint.
 *
 * @Annotation
 */
class ApiChoice extends Constraint
{
    /**
     * @var string
     */
    public $message = "Param '{{ param }}' must be one of the following: {{ choices }}.";

    /**
     * @var array
     */
    public $choices;

    /**
     * {@inheritdoc}
     */
    public function getDefaultOption()
    {
        return 'choices';
    }

    /**
     * {@inheritdoc}
     */
    public function getRequiredOptions()
    {
        return ['choices'];
    }
}