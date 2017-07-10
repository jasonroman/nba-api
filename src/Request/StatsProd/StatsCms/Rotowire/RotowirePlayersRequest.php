<?php

namespace JasonRoman\NbaApi\Request\StatsProd\StatsCms\Rotowire;

use JasonRoman\NbaApi\Request\AbstractStatsProdRequest;

/**
 * Get the rotowire for all players.
 */
class RotowirePlayersRequest extends AbstractStatsProdRequest
{
    const ENDPOINT = '/wp-json/statscms/v1/rotowire/player/';
}