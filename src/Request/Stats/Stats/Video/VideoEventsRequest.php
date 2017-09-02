<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Video;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Params\GameEventIdParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;

/**
 * Get details about a game event; namely the UUID that can be used in Nba\Wsc\Video\VideoRequest to get more details.
 */
class VideoEventsRequest extends AbstractStatsStatsRequest
{
    const ENDPOINT = '/stats/videoevents';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(GameIdParam::FORMAT)
     *
     * @var string
     */
    public $gameId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = GameEventIdParam::MIN, max = GameEventIdParam::MAX)
     *
     * @var int
     */
    public $gameEventId;

    /**
     * {@inheritdoc}
     */
    public function getExampleValues(): array
    {
        return array_merge(parent::getExampleValues(), [
            'gameEventId' => 1,
        ]);
    }
}