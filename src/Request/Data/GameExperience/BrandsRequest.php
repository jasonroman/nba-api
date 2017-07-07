<?php

namespace JasonRoman\NbaApi\Request\Data\GameExperience;

use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the brand information (timezone, primary/accent colors, Facebook app id) for teams/organizations.
 * Organizations include NBA, ABC, ESPN, TNT, NBATV, League Pass.
 */
class BrandsRequest extends AbstractDataRequest
{
    const ENDPOINT = '/json/ge/brands.json';
}