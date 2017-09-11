<?php

namespace JasonRoman\NbaApi\Tests\Unit\Request;

use JasonRoman\NbaApi\Request\RequestPropertyUtility;
use JasonRoman\NbaApi\Tests\Unit\Request\Fixtures\TestRequest;
use PHPUnit\Framework\TestCase;

class RequestPropertyUtilityTest extends TestCase
{
    public function testGetDescription()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'test');

        $this->assertSame("Here is\na description.", $rpu->getDescription());
    }

    public function dataProviderForTestGetDefaultValue()
    {
        return [
            ['test', 1],
            ['noDescription', null],
            ['noVar', 'default'],
            ['bool', true],
            ['dateTime', new \DateTime('2017-01-01')],
        ];
    }

    /**
     * @dataProvider dataProviderForTestGetDefaultValue
     *
     * @param string $property
     * @param mixed $expected
     */
    public function testGetDefaultValue(string $property, $expected)
    {
        $rpu          = new RequestPropertyUtility(new TestRequest(), $property);
        $defaultValue = $rpu->getDefaultValue();

        (!$expected instanceof \DateTime)
            ? $this->assertSame($expected, $defaultValue)
            : $this->assertEquals($expected, $defaultValue);
    }

    public function dataProviderForTestGetDefaultValueAsString()
    {
        return [
            ['test', '1'],
            ['noDescription', ''],
            ['noVar', 'default'],
            ['bool', 'true'],
            ['dateTime', '2017-01-01'],
        ];
    }

    /**
     * @dataProvider dataProviderForTestGetDefaultValueAsString
     *
     * @param string $property
     * @param mixed $expected
     */
    public function testGetDefaultValueAsString(string $property, $expected)
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), $property);
        $this->assertSame($expected, $rpu->getDefaultValueAsString());
    }

    public function dataProviderForTestGetExampleValue()
    {
        return [
            ['test', 5],
            ['noDescription', [1, 2, 3, 4, 5]],
            ['noVar', null],
            ['bool', false],
        ];
    }

    /**
     * @dataProvider dataProviderForTestGetExampleValue
     *
     * @param string $property
     * @param mixed $expected
     */
    public function testGetExampleValue(string $property, $expected)
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), $property);
        $this->assertSame($expected, $rpu->getExampleValue());
    }

    public function dataProviderForTestGetExampleValueAsString()
    {
        return [
            ['test', '5'],
            ['noDescription', '1, 2, 3, 4, 5'],
            ['noVar', ''],
            ['bool', 'false'],
        ];
    }

    /**
     * @dataProvider dataProviderForTestGetExampleValueAsString
     *
     * @param string $property
     * @param mixed $expected
     */
    public function testGetExampleValueAsString(string $property, $expected)
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), $property);
        $this->assertSame((string) $expected, $rpu->getExampleValueAsString());
    }


    public function dataProviderForTestIsRequired()
    {
        return [
            ['notBlank', true],
            ['notNull', true],
            ['noDescription', false],
            ['all', true],
        ];
    }

    /**
     * @dataProvider dataProviderForTestIsRequired
     *
     * @param string $property
     * @param bool $expected
     */
    public function testIsRequired(string $property, bool $expected)
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), $property);
        $this->assertSame($expected, $rpu->isRequired());
    }

    public function testGetNotBlankTrue()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'notBlank');
        $this->assertTrue($rpu->getNotBlank());
    }

    public function testGetNotBlankFalse()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'noNotBlank');
        $this->assertFalse($rpu->getNotBlank());

        $rpu = new RequestPropertyUtility(new TestRequest(), 'all');
        $this->assertFalse($rpu->getNotBlank());
    }

    public function testGetNotNullTrue()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'notNull');
        $this->assertTrue($rpu->getNotNull());

        $rpu = new RequestPropertyUtility(new TestRequest(), 'all');
        $this->assertTrue($rpu->getNotNull());
    }

    public function testGetNotNullFalse()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'noNotNull');
        $this->assertFalse($rpu->getNotNull());
    }

    public function testGetRegex()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'regex');
        $this->assertSame(TestRequest::REGEX, $rpu->getRegex());
    }

    public function testGetRegexNull()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'noRegex');
        $this->assertNull($rpu->getRegex());
    }

    public function testGetChoices()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'choices');
        $this->assertSame(TestRequest::OPTIONS, $rpu->getChoices());
    }

    public function testGetChoicesNull()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'noChoices');
        $this->assertNull($rpu->getChoices());
    }

    public function testGetType()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'test');
        $this->assertSame('\DateTime', $rpu->getType());
    }

    public function testGetTypeArray()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'all');
        $this->assertSame('int[]', $rpu->getType());
    }

    public function testGetTypeNull()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'noType');
        $this->assertNull($rpu->getChoices());
    }

    public function testGetRange()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'range');
        $this->assertSame(['min' => 1, 'max' => 5], $rpu->getRange());
    }

    public function testGetRangeNull()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'noRange');
        $this->assertNull($rpu->getRange());
    }

    public function testGetUuidStrict()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'uuidStrict');
        $this->assertSame(RequestPropertyUtility::UUID_CONSTRAINT_STRICT_VALUE, $rpu->getUuid());
    }

    public function testGetUuidNotStrict()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'uuidNotStrict');
        $this->assertSame(RequestPropertyUtility::UUID_CONSTRAINT_NON_STRICT_VALUE, $rpu->getUuid());
    }

    public function testGetUuidNull()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'noUuid');
        $this->assertNull($rpu->getUuid());
    }

    public function testGetCount()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'count');
        $this->assertSame(['min' => 5, 'max' => 5], $rpu->getCount());
    }

    public function testGetCountNull()
    {
        $rpu = new RequestPropertyUtility(new TestRequest(), 'noCount');
        $this->assertNull($rpu->getCount());
    }
}