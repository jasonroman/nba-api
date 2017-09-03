<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Scores;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Params\Data\GameDateParam;
use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;

/**
 * Get all of the games/scores for a specific date. This includes mobile/desktop/ticket links and broadcast information.
 */
class ScoreboardRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v2/{gameDate}/scoreboard.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     * @Assert\Range(min = GameDateParam::MIN_DATE)
     *
     * @var \DateTime
     */
    public $gameDate;
}