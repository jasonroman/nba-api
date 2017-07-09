<?php

namespace JasonRoman\NbaApi\Params;

class TeamIdParam extends AbstractDataParam
{
    // some endpoints require this, but '0' indicates all teams; why not just make it not required? who knows...
    const MIN_ALL = 0;

    // normally would not have '_VALUE' attached, but team Minnesota trumps that here...go figure
    const MIN_VALUE = 1;
    const MAX_VALUE = 2147483647;

    // nba team ids by abbreviation
    const ATL = 1610612737;
    const BOS = 1610612738;
    const BKN = 1610612751;
    const CHA = 1610612766;
    const CHI = 1610612741;
    const CLE = 1610612739;
    const DAL = 1610612742;
    const DEN = 1610612743;
    const DET = 1610612765;
    const GSW = 1610612744;
    const HOU = 1610612745;
    const IND = 1610612754;
    const LAC = 1610612746;
    const LAL = 1610612747;
    const MEM = 1610612763;
    const MIA = 1610612748;
    const MIL = 1610612749;
    const MIN = 1610612750;
    const NOP = 1610612740;
    const NYK = 1610612752;
    const OKC = 1610612760;
    const ORL = 1610612753;
    const PHI = 1610612755;
    const PHX = 1610612756;
    const POR = 1610612757;
    const SAC = 1610612758;
    const SAS = 1610612759;
    const TOR = 1610612761;
    const UTA = 1610612762;
    const WAS = 1610612764;

    // nba team ids by city/name
    const ATLANTA_HAWKS          = 1610612737;
    const BOSTON_CELTICS         = 1610612738;
    const BROOKLYN_NETS          = 1610612751;
    const CHARLOTTE_HORNETS      = 1610612766;
    const CHICAGO_BULLS          = 1610612741;
    const CLEVELAND_CAVALIERS    = 1610612739;
    const DALLAS_MAVERICKS       = 1610612742;
    const DENVER_NUGGETS         = 1610612743;
    const DETROIT_PISTONS        = 1610612765;
    const GOLDEN_STATE_WARRIORS  = 1610612744;
    const HOUSTON_ROCKETS        = 1610612745;
    const INDIANA_PACERS         = 1610612754;
    const LOS_ANGELES_CLIPPERS   = 1610612746;
    const LOS_ANGELES_LAKERS     = 1610612747;
    const MEMPHIS_GRIZZLIES      = 1610612763;
    const MIAMI_HEAT             = 1610612748;
    const MILWAUKEE_BUCKS        = 1610612749;
    const MINNESOTA_TIMBERWOLVES = 1610612750;
    const NEW_ORLEANS_PELICANS   = 1610612740;
    const NEW_YORK_KNICKS        = 1610612752;
    const OKLAHOMA_CITY_THUNDER  = 1610612760;
    const ORLANDO_MAGIC          = 1610612753;
    const PHILADELPHIA_76ERS     = 1610612755;
    const PHOENIX_SUNS           = 1610612756;
    const PORTLAND_TRAIL_BLAZERS = 1610612757;
    const SACRAMENTO_KINGS       = 1610612758;
    const SAN_ANTONIO_SPURS      = 1610612759;
    const TORONTO_RAPTORS        = 1610612761;
    const UTAH_JAZZ              = 1610612762;
    const WASHINGTON_WIZARDS     = 1610612764;

    // standard allowed options
    const OPTIONS = [
        self::ATLANTA_HAWKS,
        self::BOSTON_CELTICS,
        self::BROOKLYN_NETS,
        self::CHARLOTTE_HORNETS,
        self::CHICAGO_BULLS,
        self::CLEVELAND_CAVALIERS,
        self::DALLAS_MAVERICKS,
        self::DENVER_NUGGETS,
        self::DETROIT_PISTONS,
        self::GOLDEN_STATE_WARRIORS,
        self::HOUSTON_ROCKETS,
        self::INDIANA_PACERS,
        self::LOS_ANGELES_CLIPPERS,
        self::LOS_ANGELES_LAKERS,
        self::MEMPHIS_GRIZZLIES,
        self::MIAMI_HEAT,
        self::MILWAUKEE_BUCKS,
        self::MINNESOTA_TIMBERWOLVES,
        self::NEW_ORLEANS_PELICANS,
        self::NEW_YORK_KNICKS,
        self::OKLAHOMA_CITY_THUNDER,
        self::ORLANDO_MAGIC,
        self::PHILADELPHIA_76ERS,
        self::PHOENIX_SUNS,
        self::PORTLAND_TRAIL_BLAZERS,
        self::SACRAMENTO_KINGS,
        self::SAN_ANTONIO_SPURS,
        self::TORONTO_RAPTORS,
        self::UTAH_JAZZ,
        self::WASHINGTON_WIZARDS,
    ];
}