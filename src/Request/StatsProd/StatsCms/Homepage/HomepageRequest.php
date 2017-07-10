<?php

namespace JasonRoman\NbaApi\Request\StatsProd\StatsCms\Homepage;

use JasonRoman\NbaApi\Request\AbstractStatsProdRequest;

/**
 * Get the homepage.
 */
class HomepageRequest extends AbstractStatsProdRequest
{
    const ENDPOINT = '/wp-json/statscms/v1/homepage/';
}