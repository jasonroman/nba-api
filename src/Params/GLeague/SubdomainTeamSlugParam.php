<?php

namespace JasonRoman\NbaApi\Params\GLeague;

use JasonRoman\NbaApi\Params\TeamSlugParam;

/**
 * G-League subdomains are the G-League team slugs.
 */
class SubdomainTeamSlugParam extends AbstractGLeagueParam
{
    const OPTIONS = TeamSlugParam::OPTIONS_G_LEAGUE;
}