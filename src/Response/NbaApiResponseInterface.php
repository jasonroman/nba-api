<?php

namespace JasonRoman\NbaApi\Response;

use Psr\Http\Message\ResponseInterface;

/**
 * Base response interface for the NBA API.
 */
interface NbaApiResponseInterface
{
    /**
     * Get the PSR Response message.
     *
     * @return ResponseInterface
     */
    public function getResponse();
}