<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

abstract class AbstractDateParam extends AbstractStatsParam
{
    const FORMAT      = '/^\d{2}\/\d{2}\/\d{4}$/';
    const DATE_FORMAT = 'm/d/Y';

    /**
     * Take a \DateTime value and convert it to the string date format that the API expects.
     *
     * @param \DateTime|mixed $dateTime
     * @return string
     */
    public static function getStringValue($dateTime): string
    {
        // do not return anything if no value was specified
        if (!$dateTime) {
            return '';
        }

        // until a mixed type is supported for type-hints, check the value here
        if (!$dateTime instanceof \DateTime) {
            return (new \DateTime($dateTime))->format(static::DATE_FORMAT);
        }

        return $dateTime->format(static::DATE_FORMAT);
    }
}