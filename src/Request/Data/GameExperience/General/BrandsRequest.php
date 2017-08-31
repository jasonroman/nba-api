<?php

namespace JasonRoman\NbaApi\Request\Data\GameExperience\General;

use JasonRoman\NbaApi\Request\Data\GameExperience\AbstractDataGameExperienceRequest;

/**
 * Get the brand information (timezone, primary/accent colors, Facebook app id) for teams/organizations.
 * Organizations include NBA, ABC, ESPN, TNT, NBATV, League Pass.
 */
class BrandsRequest extends AbstractDataGameExperienceRequest
{
    const ENDPOINT = '/json/ge/brands.json';
}