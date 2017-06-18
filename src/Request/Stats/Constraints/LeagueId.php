<?php

namespace JasonRoman\NbaApi\Request\Stats\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Constraint class for league id.
 *
 * @Annotation
 */
class LeagueId extends Constraint
{
    const FORMAT          = '^\d{2}$';
    const FORMAT_NBA_WNBA = '/(00)|(20)/'; // for leaguedashlineups - check others

    const VALID_OPTIONS = [
        self::NBA,
        self::ABA,
        self::WNBA,
        self::D_LEAGUE,
    ];

    public $message = 'Provided league id "{{ string }} must be of format '.self::FORMAT;
}