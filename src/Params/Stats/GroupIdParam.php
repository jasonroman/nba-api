<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class GroupIdParam extends AbstractDataParam
{
    const FORMAT = '/^\d+(( - \d+){2,4})?$/';
}