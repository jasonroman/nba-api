<?php

namespace JasonRoman\NbaApi\Request\Stats;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Stats\Params\LeagueId;

class VideoStatus extends AbstractStatsApiRequest
{
    /**
     * @LeagueId()
     * @Assert\NotBlank()
     */
    public $leagueId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    public $gameDate;

    /**
     * do some sort of default game date that resets at a particular time, like seasons and august
     * @return \DateTime
     */
    /*public function getDefaultGameDate()
    {
        return new \DateTime('yesterday');
    }*/
}