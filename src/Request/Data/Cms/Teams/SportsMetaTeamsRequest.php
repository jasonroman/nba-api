<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Teams;

use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get all of the current NBA teams and basic team information; also gets season meta data.
 */
class SportsMetaTeamsRequest extends AbstractDataRequest
{
    const ENDPOINT = '/json/cms/noseason/sportsmeta/nba_teams.json';
}