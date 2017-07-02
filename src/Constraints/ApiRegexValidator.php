<?php

namespace JasonRoman\NbaApi\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * Custom Validator class based on Symfony Regex validator.
 *
 * @Annotation
 */
class ApiRegexValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof ApiRegex) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\ApiRegex');
        }

        if (null === $value || '' === $value) {
            return;
        }

        if (!is_scalar($value) && !(is_object($value) && method_exists($value, '__toString'))) {
            throw new UnexpectedTypeException($value, 'string');
        }

        $value = (string) $value;

        if (preg_match($constraint->pattern, $value) !== 1) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ param }}', $this->context->getPropertyName())
                ->setParameter('{{ regex }}', $constraint->pattern)
                ->addViolation();
        }
    }
}