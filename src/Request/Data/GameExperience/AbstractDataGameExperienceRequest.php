<?php

namespace JasonRoman\NbaApi\Request\Data\GameExperience;

use JasonRoman\NbaApi\Client\Data\DataGameExperienceClient;
use JasonRoman\NbaApi\Request\Data\AbstractDataRequest;

/**
 * Base class which any Data\GameExperience requests must extend from.
 */
abstract class AbstractDataGameExperienceRequest extends AbstractDataRequest
{
    const CLIENT = DataGameExperienceClient::class;
}