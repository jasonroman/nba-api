<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Player;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\PlayerIdParam;
use JasonRoman\NbaApi\Params\Stats\PerModeParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\Stats\MeasureTypeParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

class PlayerFantasyProfileRequest extends AbstractDataRequest
{
    const ENDPOINT = '/stats/playerfantasyprofile';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(MeasureTypeParam::OPTIONS_BASE)
     *
     * @var string
     */
    public $measureType;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(PerModeParam::OPTIONS_TOTALS_PER_GAME_PER_36)
     *
     * @var string
     */
    public $perMode;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("bool")
     *
     * @var bool
     */
    public $plusMinus;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("bool")
     *
     * @var bool
     */
    public $paceAdjust;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("bool")
     *
     * @var bool
     */
    public $rank;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LeagueIdParam::OPTIONS_NBA_G_LEAGUE)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = SeasonParam::FORMAT)
     *
     * @var string
     */
    public $season;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonTypeParam::OPTIONS)
     *
     * @var string
     */
    public $seasonType;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN, max = PlayerIdParam::MAX)
     *
     * @var int
     */
    public $playerId;

    /**
     * {@inheritdoc}
     */
    public function getDefaultValues(): array
    {
        return [
            'measureType'    => MeasureTypeParam::BASE,
            'perMode'        => PerModeParam::PER_GAME,
            'plusMinus'      => false,
            'paceAdjust'     => false,
            'rank'           => false,
            'seasonType'     => SeasonTypeParam::REGULAR_SEASON,
        ];
    }
}