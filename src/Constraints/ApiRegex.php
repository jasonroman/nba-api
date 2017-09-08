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
    const DEFAULT_OPTION = 'pattern';

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
        return self::DEFAULT_OPTION;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequiredOptions()
    {
        return [self::DEFAULT_OPTION];
    }
}