<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Stats\Data\SportVu\PlayerCatchAndShootRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\PlayerDefenseRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\PlayerDrivesRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\PlayerPassingRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\PlayerPullUpShootingRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\PlayerReboundingRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\PlayerShootingRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\PlayerSpeedRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\PlayerTouchesRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\TeamCatchAndShootRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\TeamDefenseRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\TeamDrivesRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\TeamPassingRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\TeamPullUpShootingRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\TeamReboundingRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\TeamShootingRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\TeamSpeedRequest;
use JasonRoman\NbaApi\Request\Stats\Data\SportVu\TeamTouchesRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\PlayerPlayTypeCutRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\PlayerPlayTypeHandoffRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\PlayerPlayTypeIsolationRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\PlayerPlayTypeMiscRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\PlayerPlayTypeOffensiveReboundRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\PlayerPlayTypeOffensiveScreenRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\PlayerPlayTypePickAndRollBallHandlerRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\PlayerPlayTypePickAndRollRollManRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\PlayerPlayTypePostupRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\PlayerPlayTypeSpotupRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\PlayerPlayTypeTransitionRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\TeamPlayTypeCutRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\TeamPlayTypeHandoffRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\TeamPlayTypeIsolationRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\TeamPlayTypeMiscRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\TeamPlayTypeOffensiveReboundRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\TeamPlayTypeOffensiveScreenRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\TeamPlayTypePickAndRollBallHandlerRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\TeamPlayTypePickAndRollRollManRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\TeamPlayTypePostupRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\TeamPlayTypeSpotupRequest;
use JasonRoman\NbaApi\Request\Stats\Data\Synergy\TeamPlayTypeTransitionRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;

/**
 * Client that accesses stats.nba.com and endpoints which contain /data in them.
 * Listed are the series of all possible Stats\Data requests.
 */
class StatsDataClient extends AbstractStatsClient
{
    /**
     * @param PlayerCatchAndShootRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerCatchAndShoot(PlayerCatchAndShootRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerDefenseRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerDefense(PlayerDefenseRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerDrivesRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerDrives(PlayerDrivesRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerPassingRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerPassing(PlayerPassingRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerPullUpShootingRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerPullUpShooting(PlayerPullUpShootingRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerReboundingRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerRebounding(PlayerReboundingRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerShootingRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerShooting(PlayerShootingRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerSpeedRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerSpeed(PlayerSpeedRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerTouchesRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerTouches(PlayerTouchesRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamCatchAndShootRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamCatchAndShoot(TeamCatchAndShootRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamDefenseRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamDefense(TeamDefenseRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamDrivesRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamDrives(TeamDrivesRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPassingRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPassing(TeamPassingRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPullUpShootingRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPullUpShooting(TeamPullUpShootingRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamReboundingRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamRebounding(TeamReboundingRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamShootingRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamShooting(TeamShootingRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamSpeedRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamSpeed(TeamSpeedRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamTouchesRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamTouches(TeamTouchesRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerPlayTypeCutRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerPlayTypeCut(PlayerPlayTypeCutRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerPlayTypeHandoffRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerPlayTypeHandoff(PlayerPlayTypeHandoffRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerPlayTypeIsolationRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerPlayTypeIsolation(PlayerPlayTypeIsolationRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerPlayTypeMiscRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerPlayTypeMisc(PlayerPlayTypeMiscRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerPlayTypeOffensiveReboundRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerPlayTypeOffensiveRebound(
        PlayerPlayTypeOffensiveReboundRequest $request,
        array $config = []
    ) {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerPlayTypeOffensiveScreenRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function PlayerPlayTypeOffensiveScreen(PlayerPlayTypeOffensiveScreenRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerPlayTypePickAndRollBallHandlerRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerPlayTypePickAndRollBallHandler(
        PlayerPlayTypePickAndRollBallHandlerRequest $request,
        array $config = []
    ) {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerPlayTypePickAndRollRollManRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerPlayTypePickAndRollRollMan(
        PlayerPlayTypePickAndRollRollManRequest $request,
        array $config = []
    ) {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerPlayTypePostupRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerPlayTypePostup(PlayerPlayTypePostupRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerPlayTypeSpotupRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerPlayTypeSpotup(PlayerPlayTypeSpotupRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerPlayTypeTransitionRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerPlayTypeTransition(PlayerPlayTypeTransitionRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPlayTypeCutRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPlayTypeCut(TeamPlayTypeCutRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPlayTypeHandoffRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPlayTypeHandoff(TeamPlayTypeHandoffRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPlayTypeIsolationRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPlayTypeIsolation(TeamPlayTypeIsolationRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPlayTypeMiscRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPlayTypeMisc(TeamPlayTypeMiscRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPlayTypeOffensiveReboundRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPlayTypeOffensiveRebound(
        TeamPlayTypeOffensiveReboundRequest $request,
        array $config = []
    ) {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPlayTypeOffensiveScreenRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function TeamPlayTypeOffensiveScreen(TeamPlayTypeOffensiveScreenRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPlayTypePickAndRollBallHandlerRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPlayTypePickAndRollBallHandler(
        TeamPlayTypePickAndRollBallHandlerRequest $request,
        array $config = []
    ) {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPlayTypePickAndRollRollManRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPlayTypePickAndRollRollMan(
        TeamPlayTypePickAndRollRollManRequest $request,
        array $config = []
    ) {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPlayTypePostupRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPlayTypePostup(TeamPlayTypePostupRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPlayTypeSpotupRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPlayTypeSpotup(TeamPlayTypeSpotupRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPlayTypeTransitionRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPlayTypeTransition(TeamPlayTypeTransitionRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}