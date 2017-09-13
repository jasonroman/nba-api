<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params\Data;

use JasonRoman\NbaApi\Params\Data\GameDateParam;
use PHPUnit\Framework\TestCase;

class GameDateParamTest extends TestCase
{
    /**
     * @return array
     */
    public function dataProviderForTestGetStringValueFromString()
    {
        return [
            ['2017-01-02', '20170102'],
            [date('Y'), (new \DateTime())->format(GameDateParam::DATE_FORMAT)],
            ['1947-12-31', '19471231'],
            ['today', (new \DateTime())->format(GameDateParam::DATE_FORMAT)],
            ['yesterday', (new \DateTime('yesterday'))->format(GameDateParam::DATE_FORMAT)],
            [null, ''],
        ];
    }

    /**
     * @dataProvider dataProviderForTestGetStringValueFromString
     *
     * @param string|null $dateTime
     * @param string $expected
     */
    public function testGetStringValueFromString($dateTime, string $expected)
    {
        $this->assertSame($expected, GameDateParam::getStringValue($dateTime));
    }
    /**
     * @return array
     */
    public function dataProviderForTestGetStringValueFromDateTime()
    {
        return [
            [new \DateTime('2017-01-02'), '20170102'],
            [new \DateTime(date('Y')), (new \DateTime())->format(GameDateParam::DATE_FORMAT)],
            [new \DateTime('1947-12-31'), '19471231'],
            [new \DateTime('today'), (new \DateTime())->format(GameDateParam::DATE_FORMAT)],
            [new \DateTime('yesterday'), (new \DateTime('yesterday'))->format(GameDateParam::DATE_FORMAT)],
        ];
    }

    /**
     * @dataProvider dataProviderForTestGetStringValueFromDateTime
     *
     * @param \DateTime $dateTime
     * @param string $expected
     */
    public function testGetStringValueFromDateTime(\DateTime $dateTime, string $expected)
    {
        $this->assertSame($expected, GameDateParam::getStringValue($dateTime));
    }
}