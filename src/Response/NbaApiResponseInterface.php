<?php

namespace JasonRoman\NbaApi\Response;

use Psr\Http\Message\ResponseInterface;

interface NbaApiResponseInterface
{
    /**
     * @return ResponseInterface
     */
    public function getResponse();
}