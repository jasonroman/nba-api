<?php

namespace JasonRoman\NbaApi\Request\Data\Params;

class FormatParam
{
    const JSON = 'json';
    const XML  = 'xml';

    const OPTIONS = [
        self::JSON,
        self::XML,
    ];

    public function getDefaultValue()
    {
        return self::JSON;
    }
}