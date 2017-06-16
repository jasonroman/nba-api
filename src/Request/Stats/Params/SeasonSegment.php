<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class SeasonSegment
{
    const FORMAT = '/^((Post All-Star)|(Pre All-Star))?$/';

    const PRE_ALL_STAR  = 'Pre All-Star';
    const POST_ALL_STAR = 'Post All-Star';

    /**
     * @var string
     */
    public $value;
}