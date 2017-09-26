<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\AllStar;

use JasonRoman\NbaApi\Params\PlayerIdParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This appears to error, possibly just when it is not the regular season.
 */
class AllStarBallotPredictorRequest extends AbstractStatsStatsRequest
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
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, max = PlayerIdParam::MAX)
     *
     * @var string
     */
    public $westPlayer2;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, max = PlayerIdParam::MAX)
     *
     * @var string
     */
    public $westPlayer3;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, max = PlayerIdParam::MAX)
     *
     * @var string
     */
    public $westPlayer4;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, max = PlayerIdParam::MAX)
     *
     * @var string
     */
    public $westPlayer5;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, max = PlayerIdParam::MAX)
     *
     * @var string
     */
    public $eastPlayer1;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, max = PlayerIdParam::MAX)
     *
     * @var string
     */
    public $eastPlayer2;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, max = PlayerIdParam::MAX)
     *
     * @var string
     */
    public $eastPlayer3;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, max = PlayerIdParam::MAX)
     *
     * @var string
     */
    public $eastPlayer4;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN_ALT, max = PlayerIdParam::MAX)
     *
     * @var string
     */
    public $eastPlayer5;

    /**
     * Not sure what this is.
     */
    public $pointCap;

    /**
     * {@inheritdoc}
     */
    public static function getDefaultValues(): array
    {
        return array_merge(parent::getDefaultValues(), [
            'westPlayer1' => 201939,
            'westPlayer2' => 201566,
            'westPlayer3' => 202695,
            'westPlayer4' => 201142,
            'westPlayer5' => 201935,
            'eastPlayer1' => 2544,
            'eastPlayer2' => 201942,
            'eastPlayer3' => 202681,
            'eastPlayer4' => 202322,
            'eastPlayer5' => 203083,
        ]);
    }
}