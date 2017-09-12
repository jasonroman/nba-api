<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params\Fixtures;

use JasonRoman\NbaApi\Params\AbstractParam as MainAbstractParam;

class AbstractUnitParam extends MainAbstractParam
{
    /**
     * Get the FQCN of the potential Param class that matches the corresponding request type.
     * For instance, passing ('Data', 'Format') would return 'JasonRoman\NbaApi\Params\Data\FormatParam'
     *
     * @param string $requestType
     * @param string $paramName
     * @return mixed|null
     */
    public static function getRequestTypeParamClass(string $requestType, string $paramName): string
    {
        return __NAMESPACE__.'\\'.$requestType.'\\'.ucfirst($paramName).static::PARAM_SUFFIX;
    }

    /**
     * Get the FQCN of the potential base Param class that matches the corresponding request type.
     * For instance, passing ('LeagueId') would return 'JasonRoman\NbaApi\Params\LeagueIdParam'
     *
     * @param string $paramName
     * @return mixed|null
     */
    public static function getParamClass(string $paramName): string
    {
        return __NAMESPACE__.'\\'.ucfirst($paramName).static::PARAM_SUFFIX;
    }
}