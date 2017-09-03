<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Scores;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Params\Data\GameDateParam;
use JasonRoman\NbaApi\Request\Data\Cms\AbstractDataCmsRequest;

/**
 * Get all of the games/scores for a specific date used by the CMS.
 */
class ScoreboardRequest extends AbstractDataCmsRequest
{
    const ENDPOINT = '/json/cms/noseason/scoreboard/{gameDate}/games.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     * @Assert\Range(min = GameDateParam::MIN_DATE)
     *
     * @var \DateTime
     */
    public $gameDate;
}