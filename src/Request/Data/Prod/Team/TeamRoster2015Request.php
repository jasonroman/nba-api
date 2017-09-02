<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Team;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use JasonRoman\NbaApi\Params\TeamSlugParam;

/**
 * Get players on a team for a given season. Available for 2015.
 */
class TeamRoster2015Request extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/{year}/teams/{teamSlug}/roster.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2015, max = 2015)
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
    public function getExampleValues(): array
    {
        return array_merge(parent::getExampleValues(), [
            'year' => 2015,
        ]);
    }
}