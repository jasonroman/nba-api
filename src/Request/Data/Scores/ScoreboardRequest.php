<?php

namespace JasonRoman\NbaApi\Request\Data\Scores;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Params\Data\GameDateParam;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get all of the games/scores for a specific date. This includes mobile/desktop/ticket links and broadcast information.
 */
class ScoreboardRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/prod/v1/{gameDate}/scoreboard.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     * @Assert\Range(min = GameDateParam::MIN_DATE)
     *
     * @var \DateTime
     */
    public $gameDate;
}