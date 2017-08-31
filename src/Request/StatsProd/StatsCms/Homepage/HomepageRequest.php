<?php

namespace JasonRoman\NbaApi\Request\StatsProd\StatsCms\Homepage;

use JasonRoman\NbaApi\Request\StatsProd\StatsCms\AbstractStatsProdStatsCmsRequest;

/**
 * Get the homepage.
 */
class HomepageRequest extends AbstractStatsProdStatsCmsRequest
{
    const ENDPOINT = '/wp-json/statscms/v1/homepage/';
}