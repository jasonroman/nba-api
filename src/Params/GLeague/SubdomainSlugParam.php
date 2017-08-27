<?php

namespace JasonRoman\NbaApi\Params\GLeague;

use JasonRoman\NbaApi\Params\TeamSlugParam;

/**
 * G-League subdomains are the G-League team slugs.
 */
class SubdomainSlugParam extends AbstractDataParam
{
    const OPTIONS = TeamSlugParam::OPTIONS_G_LEAGUE;
}