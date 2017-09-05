<?php

namespace JasonRoman\NbaApi\Params;

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
     *
     * @param mixed $value
     * @return string
     */
    public static function getStringValue($value): string
    {
        if ($value instanceof \DateTime) {
            return $value->format('Y-m-d');
        }

        return (string) $value;
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
        return __NAMESPACE__.'\\'.$requestType.'\\'.ucfirst($paramName).self::PARAM_SUFFIX;
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
        return __NAMESPACE__.'\\'.ucfirst($paramName).self::PARAM_SUFFIX;
    }
}