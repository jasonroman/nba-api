<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Scores;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Params\Data\GameDateParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get all of the games/scores for a specific date. This includes mobile/desktop/ticket links and broadcast information.
 */
class ScoreboardRequest extends AbstractDataRequest
{
    const ENDPOINT = '/prod/v2/{gameDate}/scoreboard.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     * @Assert\Range(min = GameDateParam::MIN_DATE)
     *
     * @var \DateTime|string if string, format is YYYY-MM-DD
     */
    public $gameDate;
}