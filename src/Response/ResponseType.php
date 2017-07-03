<?php

namespace JasonRoman\NbaApi\Response;

class ResponseType
{
    const JSON = 'json';
    const PDF  = 'pdf';
    const XML  = 'xml';

    const ACCEPT_JSON = 'application/json';
    const ACCEPT_PDF  = 'application/pdf';
    const ACCEPT_XML  = 'application/xml, text/xml';

    const TYPES = [
        self::JSON,
        self::PDF,
        self::XML,
    ];

    const ACCEPT_HEADERS = [
        self::JSON => self::ACCEPT_JSON,
        self::PDF  => self::ACCEPT_PDF,
        self::XML  => self::ACCEPT_XML,
    ];
}