<?php

namespace JasonRoman\NbaApi\Params;

class PlayerIdParam extends AbstractParam
{
    const MIN = 1;
    const MAX = 2147483647;

    // some requests have a minimum of 1; does not matter though, as neither 0 nor 1 are existing player ids.
    const MIN_ALT = 0;

    // some requests take multiple player ids and the others are optional; with a value of 0.
    const NONE = 0;

    /**
     * {@inheritdoc}
     */
    public static function getExampleValue()
    {
        return 201939; // steph curry
    }
}