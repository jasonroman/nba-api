<?php

namespace JasonRoman\NbaApi\Tests\Unit\Request\Fixtures;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;
use Symfony\Component\Validator\Constraints as Assert;

class TestRequest extends AbstractNbaApiRequest
{
    const TEST_REGEX = '/test/';

    /**
     * Here is
     *
     * a description.
     *
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     * @ApiAssert\ApiRegex(TestRequest::TEST_REGEX)
     *
     * @var \DateTime
     */
    public $test;

    /**
     * @var int
     */
    public $noDescription;

    /**
     * @Assert\NotNull
     */
    public $noVar;

    /**
     * @Assert\Count(max = 5)
     * @Assert\All({
     *     @Assert\NotNull(),
     *     @Assert\Type("int"),
     *     @Assert\Range(min = 1, max = 5)
     * })
     * @var int[]
     */
    public $all;
}