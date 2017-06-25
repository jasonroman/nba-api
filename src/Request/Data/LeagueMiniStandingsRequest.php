<?php

namespace JasonRoman\NbaApi\Request\Data;

class LeagueMiniStandingsRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/current/standings_all_no_sort_keys.json';
}