<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params;

use JasonRoman\NbaApi\Params\SeasonIdParam;
use PHPUnit\Framework\TestCase;

class SeasonIdParamTest extends TestCase
{
    public function testFromYearAndPrefix()
    {
        $this->assertSame('12100', SeasonIdParam::fromYearAndPrefix(2100, SeasonIdParam::PREFIX_PRESEASON));
        $this->assertSame('22015', SeasonIdParam::fromYearAndPrefix(2015, SeasonIdParam::PREFIX_REGULAR_SEASON));
        $this->assertSame('32017', SeasonIdParam::fromYearAndPrefix(2017, SeasonIdParam::PREFIX_ALL_STAR));
        $this->assertSame('41947', SeasonIdParam::fromYearAndPrefix(1947, SeasonIdParam::PREFIX_PLAYOFFS));
    }

    /**
     * @return array
     */
    public function dataProviderForTestFromYearAndPrefixInvalidPrefix()
    {
        return [
            [2015, 0],
            [2017, 5],
            [1900, -1],
        ];
    }

    /**
     * @dataProvider dataProviderForTestFromYearAndPrefixInvalidPrefix
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Season ID prefix is invalid
     *
     * @param int $year
     * @param int $prefix
     */
    public function testFromYearAndPrefixInvalidPrefix(int $year, int $prefix)
    {
        SeasonIdParam::fromYearAndPrefix($year, $prefix);
    }

    public function testCurrentSeasonId()
    {
        if (date('n') < 7) {
            $this->assertSame(
                '2'.(date('Y') - 1),
                SeasonIdParam::currentSeasonId(SeasonIdParam::PREFIX_REGULAR_SEASON)
            );
        } else {
            $this->assertSame(
                '2'.(date('Y')),
                SeasonIdParam::currentSeasonId(SeasonIdParam::PREFIX_REGULAR_SEASON)
            );
        }
    }
}