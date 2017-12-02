<?php

namespace JasonRoman\NbaApi\Params;

class TeamIdParam extends AbstractParam
{
    // some endpoints require this, but '0' indicates all teams; why not just make it not required? who knows...
    const MIN_ALL = 0;

    // normally would not have '_VALUE' attached, but team Minnesota trumps that here...go figure
    const MIN = 1;
    const MAX = 2147483647;

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

    // g-league team ids - ids for the 4 new teams are currently missing
    const AGUA_CALIENTE_CLIPPERS   = 'aguacaliente';
    const AUSTIN_SPURS             = 1612709890;
    const CANTON_CHARGE            = 1612709893;
    const DELAWARE_87ERS           = 1612709909;
    const ERIE_BAYHAWKS            = 1612709913;
    const FORT_WAYNE_MAD_ANTS      = 1612709910;
    const GREENSBORO_SWARM         = 1612709922;
    const GRAND_RAPIDS_DRIVE       = 1612709917;
    const IOWA_WOLVES              = 1612709911;
    const LAKELAND_MAGIC           = 'lakeland';
    const LONG_ISLAND_NETS         = 1612709921;
    const MAINE_RED_CLAWS          = 1612709915;
    const MEMPHIS_HUSTLE           = 'memphis';
    const NORTHERN_ARIZONA_SUNS    = 1612709900;
    const OKLAHOMA_CITY_BLUE       = 1612709889;
    const RAPTORS_905              = 1612709920;
    const RENO_BIGHORNS            = 1612709914;
    const RIO_GRANDE_VALLEY_VIPERS = 1612709908;
    const SALT_LAKE_CITY_STARS     = 1612709903;
    const SANTA_CRUZ_WARRIORS      = 1612709902;
    const SIOUX_FALLS_SKYFORCE     = 1612709904;
    const SOUTH_BAY_LAKERS         = 1612709905;
    const TEXAS_LEGENDS            = 1612709918;
    const WESTCHESTER_KNICKS       = 1612709919;
    const WINDY_CITY_BULLS         = 1612709923;
    const WISCONSIN_HERD           = 'wisconsin';

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

    const OPTIONS_G_LEAGUE = [
        self::AGUA_CALIENTE_CLIPPERS,
        self::AUSTIN_SPURS,
        self::CANTON_CHARGE,
        self::DELAWARE_87ERS,
        self::ERIE_BAYHAWKS,
        self::FORT_WAYNE_MAD_ANTS,
        self::GREENSBORO_SWARM,
        self::GRAND_RAPIDS_DRIVE,
        self::IOWA_WOLVES,
        self::LAKELAND_MAGIC,
        self::LONG_ISLAND_NETS,
        self::MAINE_RED_CLAWS,
        self::MEMPHIS_HUSTLE,
        self::NORTHERN_ARIZONA_SUNS,
        self::OKLAHOMA_CITY_BLUE,
        self::RAPTORS_905,
        self::RENO_BIGHORNS,
        self::RIO_GRANDE_VALLEY_VIPERS,
        self::SALT_LAKE_CITY_STARS,
        self::SANTA_CRUZ_WARRIORS,
        self::SIOUX_FALLS_SKYFORCE,
        self::SOUTH_BAY_LAKERS,
        self::TEXAS_LEGENDS,
        self::WESTCHESTER_KNICKS,
        self::WINDY_CITY_BULLS,
        self::WISCONSIN_HERD,
    ];

    /**
     * {@inheritdoc}
     */
    public static function getExampleValue()
    {
        return self::HOUSTON_ROCKETS;
    }
}