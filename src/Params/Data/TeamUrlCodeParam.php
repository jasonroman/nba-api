<?php

namespace JasonRoman\NbaApi\Params\Data;

class TeamUrlCodeParam extends AbstractDataParam
{
    // nba team codes by abbreviation
    const ATL = 'hawks';
    const BOS = 'celtics';
    const BKN = 'nets';
    const CHA = 'hornets';
    const CHI = 'bulls';
    const CLE = 'cavaliers';
    const DAL = 'mavericks';
    const DEN = 'nuggets';
    const DET = 'pistons';
    const GSW = 'warriors';
    const HOU = 'rockets';
    const IND = 'pacers';
    const LAC = 'clippers';
    const LAL = 'lakers';
    const MEM = 'grizzlies';
    const MIA = 'heat';
    const MIL = 'bucks';
    const MIN = 'timberwolves';
    const NOP = 'pelicans';
    const NYK = 'knicks';
    const OKC = 'thunder';
    const ORL = 'magic';
    const PHI = 'sixers';
    const PHX = 'suns';
    const POR = 'blazers';
    const SAC = 'kings';
    const SAS = 'spurs';
    const TOR = 'raptors';
    const UTA = 'jazz';
    const WAS = 'wizards';

    // nba team codes by city/name
    const ATLANTA_HAWKS          = 'hawks';
    const BOSTON_CELTICS         = 'celtics';
    const BROOKLYN_NETS          = 'nets';
    const CHARLOTTE_HORNETS      = 'hornets';
    const CHICAGO_BULLS          = 'bulls';
    const CLEVELAND_CAVALIERS    = 'cavaliers';
    const DALLAS_MAVERICKS       = 'mavericks';
    const DENVER_NUGGETS         = 'nuggets';
    const DETROIT_PISTONS        = 'pistons';
    const GOLDEN_STATE_WARRIORS  = 'warriors';
    const HOUSTON_ROCKETS        = 'rockets';
    const INDIANA_PACERS         = 'pacers';
    const LOS_ANGELES_CLIPPERS   = 'clippers';
    const LOS_ANGELES_LAKERS     = 'lakers';
    const MEMPHIS_GRIZZLIES      = 'grizzlies';
    const MIAMI_HEAT             = 'heat';
    const MILWAUKEE_BUCKS        = 'bucks';
    const MINNESOTA_TIMBERWOLVES = 'timberwolves';
    const NEW_ORLEANS_PELICANS   = 'pelicans';
    const NEW_YORK_KNICKS        = 'knicks';
    const OKLAHOMA_CITY_THUNDER  = 'thunder';
    const ORLANDO_MAGIC          = 'magic';
    const PHILADELPHIA_76ERS     = 'sixers';
    const PHOENIX_SUNS           = 'suns';
    const PORTLAND_TRAIL_BLAZERS = 'blazers';
    const SACRAMENTO_KINGS       = 'kings';
    const SAN_ANTONIO_SPURS      = 'spurs';
    const TORONTO_RAPTORS        = 'raptors';
    const UTAH_JAZZ              = 'jazz';
    const WASHINGTON_WIZARDS     = 'wizards';

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