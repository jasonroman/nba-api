<?php

namespace JasonRoman\NbaApi\Request\Data\MobileTeams;

use JasonRoman\NbaApi\Params\Data\MonthNumParam;
use JasonRoman\NbaApi\Params\Data\SeasonTypeCodeParam;
use JasonRoman\NbaApi\Request\Data\AbstractDataRequest;

/**
 * Base class which any Data\MobileTeams requests must extend from.
 */
abstract class AbstractDataMobileTeamsRequest extends AbstractDataRequest
{
    /**
     * {@inheritdoc}
     */
    public function getExampleValues(): array
    {
        return array_merge(parent::getExampleValues(), [
            'seasonTypeCode' => SeasonTypeCodeParam::REGULAR_SEASON,
            'monthNum'       => MonthNumParam::JAN,
        ]);
    }
}