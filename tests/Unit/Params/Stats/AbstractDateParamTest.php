<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params\Data;

use JasonRoman\NbaApi\Params\Stats\AbstractDateParam;
use PHPUnit\Framework\TestCase;

class AbstractDateTest extends TestCase
{
    /**
     * @return array
     */
    public function dataProviderForTestGetStringValueFromString()
    {
        return [
            ['2017-01-02', '01/02/2017'],
            [date('Y'), (new \DateTime())->format(AbstractDateParam::DATE_FORMAT)],
            ['1947-12-31', '12/31/1947'],
            ['today', (new \DateTime())->format(AbstractDateParam::DATE_FORMAT)],
            ['yesterday', (new \DateTime('yesterday'))->format(AbstractDateParam::DATE_FORMAT)],
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
        $this->assertSame($expected, AbstractDateParam::getStringValue($dateTime));
    }
    /**
     * @return array
     */
    public function dataProviderForTestGetStringValueFromDateTime()
    {
        return [
            [new \DateTime('2017-01-02'), '01/02/2017'],
            [new \DateTime(date('Y')), (new \DateTime())->format(AbstractDateParam::DATE_FORMAT)],
            [new \DateTime('1947-12-31'), '12/31/1947'],
            [new \DateTime('today'), (new \DateTime())->format(AbstractDateParam::DATE_FORMAT)],
            [new \DateTime('yesterday'), (new \DateTime('yesterday'))->format(AbstractDateParam::DATE_FORMAT)],
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
        $this->assertSame($expected, AbstractDateParam::getStringValue($dateTime));
    }
}