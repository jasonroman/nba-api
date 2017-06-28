<?php

namespace JasonRoman\NbaApi\Params\Data;

class FormatParam extends AbstractDataParam
{
    const JSON = 'json';
    const XML  = 'xml';

    // standard allowed options
    const OPTIONS = [
        self::JSON,
        self::XML,
    ];

    /**
     * {@inheritdoc}
     * @return string
     */
    public static function getDefaultValue() : string
    {
        return self::JSON;
    }
}