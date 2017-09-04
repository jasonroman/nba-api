<?php

namespace JasonRoman\NbaApi\Request\StatsProd\StatsCms\Rotowire;

use JasonRoman\NbaApi\Request\StatsProd\AbstractStatsProdRequest;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\AbstractStatsProdStatsCmsRequest;

/**
 * Get the rotowire for all players.
 */
class RotowirePlayersRequest extends AbstractStatsProdStatsCmsRequest
{
    const ENDPOINT = '/wp-json/statscms/v1/rotowire/player/';

    const CONFIG = [
        'base_uri' => AbstractStatsProdRequest::BASE_URI,
        'timeout'  => 60,
    ];
}