<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class StatType
{
    const FORMAT = '/^(Traditional)|(Advanced)|(Tracking)$/';

    const ADVANCED    = 'Advanced';
    const TRACKING    = 'Tracking';
    const TRADITIONAL = 'Traditional';

    /**
     * @var string
     */
    public $value;
}