<?php

namespace JasonRoman\NbaApi\Response;

use Psr\Http\Message\ResponseInterface;

interface ApiResponseInterface
{
    /**
     * @return ResponseInterface
     */
    public function getResponse();
}