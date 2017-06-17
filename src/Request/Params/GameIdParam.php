<?php

namespace JasonRoman\NbaApi\Request\Params;

class GameIdParam extends AbstractParam
{
    const FORMAT = '/^\d{10}$/';
}