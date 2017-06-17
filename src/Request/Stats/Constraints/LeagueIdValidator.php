<?php

namespace JasonRoman\NbaApi\Request\Stats\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Constraint class for league id.
 *
 * @Annotation
 */
class LeagueIdValidator extends ConstraintValidator
{
    /**
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        /** @var LeagueId $constraint */
        if (
            !is_string($value) ||
            !preg_match(LeagueId::FORMAT, $value) ||
            !in_array($value, LeagueId::VALID_OPTIONS)
        ) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}