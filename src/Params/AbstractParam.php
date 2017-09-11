<?php

namespace JasonRoman\NbaApi\Params;

use JasonRoman\NbaApi\Request\RequestPropertyUtility;

class AbstractParam
{
    const PARAM_SUFFIX = 'Param';

    /**
     * Override this method in individual param classes to provide a default value if none is specified.
     *
     * @return mixed|null
     */
    public static function getDefaultValue()
    {
        return null;
    }

    /**
     * Override this method in individual param classes to provide an example value if none is specified.
     *
     * @return mixed|null
     */
    public static function getExampleValue()
    {
        return null;
    }

    /**
     * Override this method in individual param classes to provide a way to convert the param value to a string.
     * Otherwise, the default conversion is taken from the RequestPropertyUtility class.
     *
     * @param mixed $value
     * @return string
     */
    public static function getStringValue($value): string
    {
        return RequestPropertyUtility::getStringValue($value);
    }

    /**
     * Get the FQCN of the potential Param class that matches the corresponding request type.
     * For instance, passing ('Data', 'Format') would return 'JasonRoman\NbaApi\Params\Data\FormatParam'
     *
     * @param string $requestType
     * @param string $paramName
     * @return mixed|null
     */
    public static function getRequestTypeParamClassFqcn(string $requestType, string $paramName): string
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
    public static function getParamClassFqcn(string $paramName): string
    {
        return __NAMESPACE__.'\\'.ucfirst($paramName).static::PARAM_SUFFIX;
    }
}