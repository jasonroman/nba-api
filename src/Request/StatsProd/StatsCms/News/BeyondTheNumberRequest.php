<?php

namespace JasonRoman\NbaApi\Request\StatsProd\StatsCms\News;

use JasonRoman\NbaApi\Request\StatsProd\StatsCms\AbstractStatsProdStatsCmsRequest;
use JasonRoman\NbaApi\Params\StatsProd\LimitParam;
use JasonRoman\NbaApi\Params\StatsProd\OffsetParam;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This references Stats 101 -> Articles on the stats.nba.com website.
 */
class BeyondTheNumberRequest extends AbstractStatsProdStatsCmsRequest
{
    const ENDPOINT = '/wp-json/statscms/v1/type/beyondthenumber';

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = LimitParam::MIN)
     *
     * @var string
     */
    public $limit;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = OffsetParam::MIN)
     *
     * @var string
     */
    public $offset;
}