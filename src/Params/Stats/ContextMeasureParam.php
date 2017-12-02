<?php declare(strict_types=1);

namespace JasonRoman\NbaApi\Params\Stats;

class ContextMeasureParam extends AbstractStatsParam
{
    const ASSISTED_FIELD_GOALS_MADE         = 'FGM_AST';
    const ASSISTED_THREE_POINTERS_MADE      = 'FG3_AST';
    const ASSISTS                           = 'AST';
    const BLOCKS                            = 'BLK';
    const BLOCKS_AGAINST                    = 'BLKA';
    const EFFECTIVE_FIELD_GOAL_PERCENTAGE   = 'EFG_PCT';
    const FIELD_GOAL_PERCENTAGE             = 'FG_PCT';
    const FIELD_GOALS_ATTEMPTED             = 'FGA';
    const FIELD_GOALS_MADE                  = 'FGM';
    const FREE_THROWS_ATTEMPTED             = 'FTA';
    const FREE_THROWS_MADE                  = 'FTM';
    const PERSONAL_FOULS                    = 'PF';
    const PERSONAL_FOULS_DRAWN              = 'PFD';
    const POINTS                            = 'PTS';
    const POINTS_FAST_BREAK                 = 'PTS_FB';
    const POINTS_OFF_TURNOVERS              = 'PTS_OFF_TOV';
    const POINTS_PAINT                      = 'PTS_PAINT';
    const POINTS_SECOND_CHANCE              = 'PTS_2ND_CHANCE';
    const POSSESSIONS_ENDING_IN_FREE_THROWS = 'POSS_END_FT';
    const REBOUNDS                          = 'REB';
    const REBOUNDS_DEFENSIVE                = 'DREB';
    const REBOUNDS_OFFEENSIVE               = 'OREB';
    const STEALS                            = 'STL';
    const THREE_POINT_PERCENTAGE            = 'FG3_PCT';
    const THREE_POINTERS_ATTEMPTED          = 'FG3A';
    const THREE_POINTERS_MADE               = 'FG3M';
    const TRUE_SHOOTING_PERCENTAGE          = 'TS_PCT';
    const TURNOVERS                         = 'TOV';

    const TEAM_ASSISTED_FIELD_GOALS_MADE         = 'TM_FGM_AST';
    const TEAM_ASSISTED_THREE_POINTERS_MADE      = 'TM_FG3_AST';
    const TEAM_ASSISTS                           = 'TM_AST';
    const TEAM_BLOCKS                            = 'TM_BLK';
    const TEAM_BLOCKS_AGAINST                    = 'TM_BLKA';
    const TEAM_FIELD_GOALS_ATTEMPTED             = 'TM_FGA';
    const TEAM_FIELD_GOALS_MADE                  = 'TM_FGM';
    const TEAM_FREE_THROWS_ATTEMPTED             = 'TM_FTA';
    const TEAM_FREE_THROWS_MADE                  = 'TM_FTA';
    const TEAM_PERSONAL_FOULS                    = 'TM_PF';
    const TEAM_PERSONAL_FOULS_DRAWN              = 'TM_PFD';
    const TEAM_POINTS                            = 'TM_PTS';
    const TEAM_POINTS_FAST_BREAK                 = 'TM_PTS_FB';
    const TEAM_POINTS_OFF_TURNOVERS              = 'TM_PTS_OFF_TOV';
    const TEAM_POINTS_PAINT                      = 'TM_PTS_PAINT';
    const TEAM_POINTS_SECOND_CHANCE              = 'TM_PTS_2ND_CHANCE';
    const TEAM_POSSESSIONS_ENDING_IN_FREE_THROWS = 'TM_POSS_END_FT';
    const TEAM_REBOUNDS                          = 'TM_REB';
    const TEAM_REBOUNDS_OFFENSIVE                = 'TM_OREB';
    const TEAM_REBOUNDS_DEFENSIVE                = 'TM_DREB';
    const TEAM_REBOUNDS_TEAM                     = 'TM_TEAM_REB';
    const TEAM_STEALS                            = 'TM_STL';
    const TEAM_THREE_POINTERS_ATTEMPTED          = 'TM_FG3A';
    const TEAM_THREE_POINTERS_MADE               = 'TM_FG3M';
    const TEAM_TURNOVERS                         = 'TM_TOV';
    const TEAM_TURNOVERS_TEAM                    = 'TM_TEAM_TOV';

    const OPPONENT_ASSISTED_FIELD_GOALS_MADE         = 'OPP_FGM_AST';
    const OPPONENT_ASSISTED_THREE_POINTERS_MADE      = 'OPP_FG3_AST';
    const OPPONENT_ASSISTS                           = 'OPP_AST';
    const OPPONENT_BLOCKS                            = 'OPP_BLK';
    const OPPONENT_BLOCKS_AGAINST                    = 'OPP_BLKA';
    const OPPONENT_FIELD_GOALS_ATTEMPTED             = 'OPP_FGA';
    const OPPONENT_FIELD_GOALS_MADE                  = 'OPP_FGM';
    const OPPONENT_FREE_THROWS_ATTEMPTED             = 'OPP_FTA';
    const OPPONENT_FREE_THROWS_MADE                  = 'OPP_FTA';
    const OPPONENT_PERSONAL_FOULS                    = 'OPP_PF';
    const OPPONENT_PERSONAL_FOULS_DRAWN              = 'OPP_PFD';
    const OPPONENT_POINTS                            = 'OPP_PTS';
    const OPPONENT_POINTS_FAST_BREAK                 = 'OPP_PTS_FB';
    const OPPONENT_POINTS_OFF_TURNOVERS              = 'OPP_PTS_OFF_TOV';
    const OPPONENT_POINTS_PAINT                      = 'OPP_PTS_PAINT';
    const OPPONENT_POINTS_SECOND_CHANCE              = 'OPP_PTS_2ND_CHANCE';
    const OPPONENT_POSSESSIONS_ENDING_IN_FREE_THROWS = 'OPP_POSS_END_FT';
    const OPPONENT_REBOUNDS                          = 'OPP_REB';
    const OPPONENT_REBOUNDS_OFFENSIVE                = 'OPP_OREB';
    const OPPONENT_REBOUNDS_DEFENSIVE                = 'OPP_DREB';
    const OPPONENT_REBOUNDS_TEAM                     = 'OPP_TEAM_REB';
    const OPPONENT_STEALS                            = 'OPP_STL';
    const OPPONENT_THREE_POINTERS_ATTEMPTED          = 'OPP_FG3A';
    const OPPONENT_THREE_POINTERS_MADE               = 'OPP_FG3M';
    const OPPONENT_TURNOVERS                         = 'OPP_TOV';
    const OPPONENT_TURNOVERS_TEAM                    = 'OPP_TEAM_TOV';

    const OPTIONS_SHOT_CHART_DETAIL = [
        self::EFFECTIVE_FIELD_GOAL_PERCENTAGE,
        self::FIELD_GOAL_PERCENTAGE,
        self::FIELD_GOALS_ATTEMPTED,
        self::FIELD_GOALS_MADE,
        self::PERSONAL_FOULS,
        self::POINTS,
        self::POINTS_FAST_BREAK,
        self::POINTS_OFF_TURNOVERS,
        self::POINTS_SECOND_CHANCE,
        self::THREE_POINT_PERCENTAGE,
        self::THREE_POINTERS_ATTEMPTED,
        self::THREE_POINTERS_MADE,
        self::TRUE_SHOOTING_PERCENTAGE,
    ];

    const OPTIONS_SHOT_CHART_LINEUP_DETAIL = [
        self::ASSISTED_FIELD_GOALS_MADE,
        self::ASSISTED_THREE_POINTERS_MADE,
        self::ASSISTS,
        self::BLOCKS,
        self::BLOCKS_AGAINST,
        self::EFFECTIVE_FIELD_GOAL_PERCENTAGE,
        self::FIELD_GOAL_PERCENTAGE,
        self::FIELD_GOALS_ATTEMPTED,
        self::FIELD_GOALS_MADE,
        self::FREE_THROWS_ATTEMPTED,
        self::FREE_THROWS_MADE,
        self::PERSONAL_FOULS,
        self::POINTS,
        self::POINTS_FAST_BREAK,
        self::POINTS_OFF_TURNOVERS,
        self::POINTS_PAINT,
        self::POINTS_SECOND_CHANCE,
        self::POSSESSIONS_ENDING_IN_FREE_THROWS,
        self::REBOUNDS,
        self::REBOUNDS_DEFENSIVE,
        self::REBOUNDS_OFFEENSIVE,
        self::THREE_POINT_PERCENTAGE,
        self::THREE_POINTERS_ATTEMPTED,
        self::THREE_POINTERS_MADE,
        self::TRUE_SHOOTING_PERCENTAGE,
        self::TURNOVERS,
        self::TEAM_ASSISTED_FIELD_GOALS_MADE,
        self::TEAM_ASSISTED_THREE_POINTERS_MADE,
        self::TEAM_ASSISTS,
        self::TEAM_BLOCKS,
        self::TEAM_BLOCKS_AGAINST,
        self::TEAM_FIELD_GOALS_ATTEMPTED,
        self::TEAM_FIELD_GOALS_MADE,
        self::TEAM_FREE_THROWS_ATTEMPTED,
        self::TEAM_FREE_THROWS_MADE,
        self::TEAM_PERSONAL_FOULS,
        self::TEAM_PERSONAL_FOULS_DRAWN,
        self::TEAM_POINTS,
        self::TEAM_POINTS_FAST_BREAK,
        self::TEAM_POINTS_OFF_TURNOVERS,
        self::TEAM_POINTS_PAINT,
        self::TEAM_POINTS_SECOND_CHANCE,
        self::TEAM_POSSESSIONS_ENDING_IN_FREE_THROWS,
        self::TEAM_REBOUNDS,
        self::TEAM_REBOUNDS_OFFENSIVE,
        self::TEAM_REBOUNDS_DEFENSIVE,
        self::TEAM_REBOUNDS_TEAM,
        self::TEAM_STEALS,
        self::TEAM_THREE_POINTERS_ATTEMPTED,
        self::TEAM_THREE_POINTERS_MADE,
        self::TEAM_TURNOVERS,
        self::TEAM_TURNOVERS_TEAM,
        self::OPPONENT_ASSISTED_FIELD_GOALS_MADE,
        self::OPPONENT_ASSISTED_THREE_POINTERS_MADE,
        self::OPPONENT_ASSISTS,
        self::OPPONENT_BLOCKS,
        self::OPPONENT_BLOCKS_AGAINST,
        self::OPPONENT_FREE_THROWS_ATTEMPTED,
        self::OPPONENT_FREE_THROWS_MADE,
        self::OPPONENT_PERSONAL_FOULS,
        self::OPPONENT_PERSONAL_FOULS_DRAWN,
        self::OPPONENT_POINTS,
        self::OPPONENT_POINTS_FAST_BREAK,
        self::OPPONENT_POINTS_OFF_TURNOVERS,
        self::OPPONENT_POINTS_PAINT,
        self::OPPONENT_POINTS_SECOND_CHANCE,
        self::OPPONENT_POSSESSIONS_ENDING_IN_FREE_THROWS,
        self::OPPONENT_REBOUNDS,
        self::OPPONENT_REBOUNDS_OFFENSIVE,
        self::OPPONENT_REBOUNDS_DEFENSIVE,
        self::OPPONENT_REBOUNDS_TEAM,
        self::OPPONENT_STEALS,
        self::OPPONENT_TURNOVERS,
        self::OPPONENT_TURNOVERS_TEAM,
    ];

    const OPTIONS_VIDEO_DETAILS = [
        self::ASSISTED_FIELD_GOALS_MADE,
        self::ASSISTED_THREE_POINTERS_MADE,
        self::ASSISTS,
        self::BLOCKS,
        self::BLOCKS_AGAINST,
        self::EFFECTIVE_FIELD_GOAL_PERCENTAGE,
        self::FIELD_GOAL_PERCENTAGE,
        self::FIELD_GOALS_ATTEMPTED,
        self::FIELD_GOALS_MADE,
        self::FREE_THROWS_ATTEMPTED,
        self::FREE_THROWS_MADE,
        self::PERSONAL_FOULS,
        self::POINTS,
        self::POINTS_FAST_BREAK,
        self::POINTS_OFF_TURNOVERS,
        self::POINTS_PAINT,
        self::POINTS_SECOND_CHANCE,
        self::POSSESSIONS_ENDING_IN_FREE_THROWS,
        self::REBOUNDS,
        self::REBOUNDS_DEFENSIVE,
        self::REBOUNDS_OFFEENSIVE,
        self::THREE_POINT_PERCENTAGE,
        self::THREE_POINTERS_ATTEMPTED,
        self::THREE_POINTERS_MADE,
        self::TRUE_SHOOTING_PERCENTAGE,
        self::TURNOVERS,
        self::TEAM_ASSISTED_FIELD_GOALS_MADE,
        self::TEAM_ASSISTED_THREE_POINTERS_MADE,
        self::TEAM_ASSISTS,
        self::TEAM_BLOCKS,
        self::TEAM_BLOCKS_AGAINST,
        self::TEAM_FIELD_GOALS_ATTEMPTED,
        self::TEAM_FIELD_GOALS_MADE,
        self::TEAM_FREE_THROWS_ATTEMPTED,
        self::TEAM_FREE_THROWS_MADE,
        self::TEAM_PERSONAL_FOULS,
        self::TEAM_PERSONAL_FOULS_DRAWN,
        self::TEAM_POINTS,
        self::TEAM_POINTS_FAST_BREAK,
        self::TEAM_POINTS_OFF_TURNOVERS,
        self::TEAM_POINTS_PAINT,
        self::TEAM_POINTS_SECOND_CHANCE,
        self::TEAM_POSSESSIONS_ENDING_IN_FREE_THROWS,
        self::TEAM_REBOUNDS,
        self::TEAM_REBOUNDS_OFFENSIVE,
        self::TEAM_REBOUNDS_DEFENSIVE,
        self::TEAM_REBOUNDS_TEAM,
        self::TEAM_STEALS,
        self::TEAM_THREE_POINTERS_ATTEMPTED,
        self::TEAM_THREE_POINTERS_MADE,
        self::TEAM_TURNOVERS,
        self::TEAM_TURNOVERS_TEAM,
        self::OPPONENT_ASSISTED_FIELD_GOALS_MADE,
        self::OPPONENT_ASSISTED_THREE_POINTERS_MADE,
        self::OPPONENT_ASSISTS,
        self::OPPONENT_BLOCKS,
        self::OPPONENT_BLOCKS_AGAINST,
        self::OPPONENT_FIELD_GOALS_ATTEMPTED,
        self::OPPONENT_FIELD_GOALS_MADE,
        self::OPPONENT_FREE_THROWS_ATTEMPTED,
        self::OPPONENT_FREE_THROWS_MADE,
        self::OPPONENT_PERSONAL_FOULS,
        self::OPPONENT_PERSONAL_FOULS_DRAWN,
        self::OPPONENT_POINTS,
        self::OPPONENT_POINTS_FAST_BREAK,
        self::OPPONENT_POINTS_OFF_TURNOVERS,
        self::OPPONENT_POINTS_PAINT,
        self::OPPONENT_POINTS_SECOND_CHANCE,
        self::OPPONENT_POSSESSIONS_ENDING_IN_FREE_THROWS,
        self::OPPONENT_REBOUNDS,
        self::OPPONENT_REBOUNDS_OFFENSIVE,
        self::OPPONENT_REBOUNDS_DEFENSIVE,
        self::OPPONENT_REBOUNDS_TEAM,
        self::OPPONENT_STEALS,
        self::OPPONENT_THREE_POINTERS_ATTEMPTED,
        self::OPPONENT_THREE_POINTERS_MADE,
        self::OPPONENT_TURNOVERS,
        self::OPPONENT_TURNOVERS_TEAM,
    ];
}