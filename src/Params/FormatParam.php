<?php

namespace JasonRoman\NbaApi\Params;

class FormatParam extends AbstractParam
{
    const JSON = 'json';
    const PDF  = 'pdf';
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