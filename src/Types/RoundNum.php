<?php

namespace JasonRoman\NbaApi\Types;

class RoundNum
{
    /**
     * Value between 1 and 21.
     *
     * Before 1974 players were selected until prospects ran out.
     * The 1960 and 1968 drafts had the most rounds, 21. 1970 had the most picks ever with 239.
     * From 1974 through 1985 there were 10 rounds.
     * From 1985 to 1988 there were 7 rounds.
     * From 1989 through present there were/are 2 rounds.
     *
     * @var int
     */
    public $value;
}