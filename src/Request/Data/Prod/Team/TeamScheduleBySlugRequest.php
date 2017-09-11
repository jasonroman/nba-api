<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Team;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use JasonRoman\NbaApi\Params\TeamSlugParam;

/**
 * Get the schedule of a team for a given season. Available from 2015. Includes scores if the game has been played.
 */
class TeamScheduleBySlugRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/{year}/teams/{teamSlug}/schedule.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2015)
     *
     * @var int
     */
    public $year;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(TeamSlugParam::OPTIONS)
     *
     * @var string
     */
    public $teamSlug;

    /**
     * {@inheritdoc}
     */
    public static function getExampleValues(): array
    {
        return array_merge(parent::getExampleValues(), [
            'year' => 2015,
        ]);
    }
}