<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class DraftPickParam extends AbstractStatsParam
{
    const FIRST_ROUND         = '1st Round';
    const SECOND_RONUD        = '2nd Round';
    const FIRST_PICK          = '1st Pick';
    const LOTTERY_PICK        = 'Lottery Pick';
    const TOP_5_PICK          = 'Top 5 Pick';
    const TOP_10_PICK         = 'Top 10 Pick';
    const TOP_15_PICK         = 'Top 15 Pick';
    const TOP_20_PICK         = 'Top 20 Pick';
    const TOP_25_PICK         = 'Top 25 Pick';
    const PICKS_11_THROUGH_20 = 'Picks 11 Thru 20';
    const PICKS_21_THROUGH_30 = 'Picks 21 Thru 30';
    const UNDRAFTED           = 'Undrafted';

    const OPTIONS = [
        self::FIRST_ROUND,
        self::SECOND_RONUD,
        self::FIRST_PICK,
        self::LOTTERY_PICK,
        self::TOP_5_PICK,
        self::TOP_10_PICK,
        self::TOP_15_PICK,
        self::TOP_20_PICK,
        self::TOP_25_PICK,
        self::PICKS_11_THROUGH_20,
        self::PICKS_21_THROUGH_30,
        self::UNDRAFTED,
    ];
}