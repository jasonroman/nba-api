<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Team;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use JasonRoman\NbaApi\Params\TeamSlugParam;

/**
 * Get statistical leaders of a team for a given season. Available for 2015.
 */
class TeamLeaders2015Request extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/{year}/teams/{teamSlug}/leaders.json';

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
        return [
            'year' => 2015,
        ];
    }
}