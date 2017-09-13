<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params;

use JasonRoman\NbaApi\Params\SeasonParam;
use PHPUnit\Framework\TestCase;

class SeasonParamTest extends TestCase
{
    public function testFromYear()
    {
        $this->assertSame('2100-01', SeasonParam::fromYear(2100));
        $this->assertSame('1999-00', SeasonParam::fromYear(1999));
        $this->assertSame('1947-48', SeasonParam::fromYear(1947));
    }

    /**
     * @return array
     */
    public function dataProviderForTestFromYearAndInvalidFormat()
    {
        return [
            [20150],
            [111],
            [-10],
        ];
    }

    /**
     * @dataProvider dataProviderForTestFromYearAndInvalidFormat
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Year must be an integer in YYYY format
     *
     * @param int $year
     */
    public function testFromYearInvalidFormat(int $year)
    {
        SeasonParam::fromYear($year);
    }

    public function testCurrentSeason()
    {
        $year = (date('n') < 7) ? (int) (date('Y') - 1) : (int) date('Y');

        $this->assertSame($year.'-'.substr((string) ($year + 1), -2), SeasonParam::currentSeason());
    }

    public function testCurrentSeasonStartYear()
    {
        $this->assertSame(
            (date('n') < 7) ? (int) (date('Y') - 1) : (int) date('Y'),
            SeasonParam::currentSeasonStartYear()
        );
    }

    public function testGetDefaultValue()
    {
        $year = (date('n') < 7) ? (int) (date('Y') - 1) : (int) date('Y');

        $this->assertSame($year.'-'.substr((string) ($year + 1), -2), SeasonParam::getDefaultValue());
    }
}