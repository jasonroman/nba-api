<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Custom Regex constraint based on Symfony constraint. Used to display the regex format in the error message.
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
     * @var string
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
        return ['pattern'];
    }
}