<?php

namespace JasonRoman\NbaApi\Params;

class TeamSlugParam extends AbstractParam
{
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

    // g-league team codes
    const AGUA_CALIENTE_CLIPPERS   = 'aguacaliente';
    const AUSTIN_SPURS             = 'austin';
    const CANTON_CHARGE            = 'canton';
    const DELAWARE_87ERS           = 'delaware';
    const ERIE_BAYHAWKS            = 'erie';
    const FORT_WAYNE_MAD_ANTS      = 'fortwayne';
    const GREENSBORO_SWARM         = 'greensboro';
    const GRAND_RAPIDS_DRIVE       = 'grandrapids';
    const IOWA_WOLVES              = 'iowa';
    const LAKELAND_MAGIC           = 'lakeland';
    const LONG_ISLAND_NETS         = 'longisland';
    const MAINE_RED_CLAWS          = 'maine';
    const MEMPHIS_HUSTLE           = 'memphis';
    const NORTHERN_ARIZONA_SUNS    = 'northernarizona';
    const OKLAHOMA_CITY_BLUE       = 'oklahomacity';
    const RAPTORS_905              = 'raptors905';
    const RENO_BIGHORNS            = 'reno';
    const RIO_GRANDE_VALLEY_VIPERS = 'riograndevalley';
    const SALT_LAKE_CITY_STARS     = 'saltlakecity';
    const SANTA_CRUZ_WARRIORS      = 'santacruz';
    const SIOUX_FALLS_SKYFORCE     = 'siouxfalls';
    const SOUTH_BAY_LAKERS         = 'southbay';
    const TEXAS_LEGENDS            = 'texas';
    const WESTCHESTER_KNICKS       = 'westchester';
    const WINDY_CITY_BULLS         = 'windycity';
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
        return self::DETROIT_PISTONS;
    }
}