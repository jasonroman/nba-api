<?php

namespace JasonRoman\NbaApi\Params;

class PlayerIdParam extends AbstractParam
{
    const MIN     = 1;
    const MAX     = 2147483647;

    // some requests have a minimum of 1; does not matter though, as neither 0 nor 1 are existing player ids.
    const MIN_ALT = 0;
}