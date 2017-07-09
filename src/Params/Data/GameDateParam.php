<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Data;

class GameDateParam extends AbstractDataParam
{
    // format for dates is YYYYMMDD
    const FORMAT      = '/^\d{4}\d{2}\d{2}$/';
    const DATE_FORMAT = 'Ymd';

    // earliest game date supported by the Data API; the first preseason game of the 2014-2015 season.
    const MIN_DATE = '2014-10-04';

    // earliest game date supported by the Data CMS API; the first preseason game of the 2012-2013 season.
    const CMS_MIN_DATE = '2012-10-05';

    // earliest game date supported by the Data CMS API for recaps/previews;
    // the first regular season game of the 2012-2013 season.
    const CMS_MIN_DATE_RECAP = '2012-10-30';
    const CMS_MIN_DATE_PREVIEW = '2012-10-30';

    const START_DATE_REGULAR_SEASON_2014 = '2014-10-28';
    const START_DATE_REGULAR_SEASON_2015 = '2015-10-27';

    const START_DATE_PRE_SEASON_2010 = '2010-10-03';
    const START_DATE_PRE_SEASON_2012 = '2012-10-05';
    const START_DATE_PRE_SEASON_2014 = '2014-10-04';
    const START_DATE_PRE_SEASON_2015 = '2015-10-02';

    /**
     * Take a \DateTime value and convert it to the string date format that the API expects.
     *
     * @param \DateTime|mixed $dateTime
     * @return string
     */
    public static function getStringValue($dateTime) : string
    {
        // until a mixed type is supported for type-hints, check the value here
        if (!$dateTime instanceof \DateTime) {
            return parent::getStringValue($dateTime);
        }

        return $dateTime->format(self::DATE_FORMAT);
    }

    /**
     * {@inheritdoc}
     * @return \DateTime
     */
    public static function getDefaultValue() : \DateTime
    {
        return new \DateTime();
    }
}