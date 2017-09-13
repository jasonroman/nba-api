<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params;

use JasonRoman\NbaApi\Params\AbstractParam;
use JasonRoman\NbaApi\Params\Data\GameDateParam as DataGameDateParam;
use JasonRoman\NbaApi\Params\FormatParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\Stats\GameDateParam as StatsGameDateParam;
use JasonRoman\NbaApi\Params\StatsProd\SeasonParam as StatsProdSeasonParam;
use PHPUnit\Framework\TestCase;

class AbstractParamTest extends TestCase
{
    public function testGetDefaultValue()
    {
        $this->assertNull(AbstractParam::getDefaultValue());
    }

    public function testGetExampleValue()
    {
        $this->assertNull(AbstractParam::getExampleValue());
    }

    public function testGetRequestTypeParamClass()
    {
        $this->assertSame(StatsProdSeasonParam::class, AbstractParam::getRequestTypeParamClass('StatsProd', 'Season'));
        $this->assertSame(DataGameDateParam::class, AbstractParam::getRequestTypeParamClass('Data', 'GameDate'));
        $this->assertSame(StatsGameDateParam::class, AbstractParam::getRequestTypeParamClass('Stats', 'GameDate'));

        $this->assertSame(
            AbstractParam::BASE_NAMESPACE.'\Stats\DoesNotExistParam',
            AbstractParam::getRequestTypeParamClass('Stats', 'DoesNotExist')
        );

        $this->assertSame(
            AbstractParam::BASE_NAMESPACE.'\DoesNotExist\DoesNotExist'.AbstractParam::PARAM_SUFFIX,
            AbstractParam::getRequestTypeParamClass('DoesNotExist', 'DoesNotExist')
        );
    }

    public function testGetParamClass()
    {
        $this->assertSame(SeasonParam::class, AbstractParam::getParamClass('Season'));
        $this->assertSame(FormatParam::class, AbstractParam::getParamClass('Format'));

        $this->assertSame(
            AbstractParam::BASE_NAMESPACE.'\DoesNotExist'.AbstractParam::PARAM_SUFFIX,
            AbstractParam::getParamClass('DoesNotExist')
        );
    }
}