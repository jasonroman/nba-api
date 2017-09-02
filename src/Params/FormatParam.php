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

    const OPTIONS_JSON = [
        self::JSON,
    ];

    /**
     * {@inheritdoc}
     * @return string
     */
    public static function getDefaultValue(): string
    {
        return self::JSON;
    }
}