<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params\GLeague;

use JasonRoman\NbaApi\Params\GLeague\AbstractTrueFalseAsIntParam;
use PHPUnit\Framework\TestCase;

class AbstractTrueFalseAsIntParamTest extends TestCase
{
    /**
     * @return array
     */
    public function dataProviderForTestGetStringValue()
    {
        return [
            [true, '1'],
            [false, '0'],
            [-1, '1'],
            ['hey', '1'],
            [null, '0'],
        ];
    }

    /**
     * @dataProvider dataProviderForTestGetStringValue
     *
     * @param mixed $value
     * @param string $expected
     */
    public function testGetStringValue($value, $expected)
    {
        $this->assertSame($expected, AbstractTrueFalseAsIntParam::getStringValue($value));
    }
}