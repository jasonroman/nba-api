<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\AllStar;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Params\PlayerIdParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * This appears to error when not during the regular season.
 */
class AllStarBallotPredictorRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/allstarballotpredictor';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, max = PlayerIdParam::MAX)
     *
     * @var int
     */
    public $westPlayer1;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, PlayerIdParam::MAX)
     *
     * @var string
     */
    public $westPlayer2;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, PlayerIdParam::MAX)
     *
     * @var string
     */
    public $westPlayer3;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, PlayerIdParam::MAX)
     *
     * @var string
     */
    public $westPlayer4;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, PlayerIdParam::MAX)
     *
     * @var string
     */
    public $westPlayer5;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, PlayerIdParam::MAX)
     *
     * @var string
     */
    public $eastPlayer1;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, PlayerIdParam::MAX)
     *
     * @var string
     */
    public $eastPlayer2;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, PlayerIdParam::MAX)
     *
     * @var string
     */
    public $eastPlayer3;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, PlayerIdParam::MAX)
     *
     * @var string
     */
    public $eastPlayer4;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, PlayerIdParam::MAX)
     *
     * @var string
     */
    public $eastPlayer5;

    /**
     * Not sure what this is.
     */
    public $pointCap;
}