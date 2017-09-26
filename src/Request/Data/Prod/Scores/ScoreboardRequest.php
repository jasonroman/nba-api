<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Scores;

use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get all of the games/scores for a specific date. This includes mobile/desktop/ticket links and broadcast information.
 */
class ScoreboardRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v2/{gameDate}/scoreboard.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     *
     * @var \DateTime
     */
    public $gameDate;
}