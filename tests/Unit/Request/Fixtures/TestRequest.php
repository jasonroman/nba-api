<?php

namespace JasonRoman\NbaApi\Tests\Unit\Request\Fixtures;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;
use Symfony\Component\Validator\Constraints as Assert;

class TestRequest extends AbstractNbaApiRequest
{
    const BASE_NAMESPACE = __NAMESPACE__;
    const TEST_REGEX     = '/test/';
    const OPTIONS        = [1, 2, 3];

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

    /**
     * @Assert\Type("bool")
     *
     * @var bool
     */
    public $bool;

    /**
     * @Assert\Type("\DateTime")
     *
     * @var \DateTime
     */
    public $dateTime;

    /**
     * @Assert\NotBlank()
     *
     * @var \DateTime
     */
    public $notBlank;

    /**
     * @Assert\NotNull()
     */
    public $notNull;

    /**
     * @ApiAssert\ApiRegex(TestRequest::TEST_REGEX)
     *
     * @var \DateTime
     */
    public $regex;

    /**
     * @ApiAssert\ApiChoice(TestRequest::OPTIONS)
     *
     * @var array
     */
    public $choices;

    /**
     * @Assert\Range(min = 1, max = 5)
     *
     * @var int
     */
    public $range;

    /**
     * @Assert\Uuid(strict = true)
     *
     * @var string
     */
    public $uuidStrict;

    /**
     * @Assert\Uuid(strict = false)
     *
     * @var string
     */
    public $uuidNotStrict;

    /**
     * @Assert\Count(min = 5, max = 5)
     *
     * @var int[]
     */
    public $count;

    public $noNotBlank;
    public $noNotNull;
    public $noRegex;
    public $noChoices;
    public $noType;
    public $noRange;
    public $noUuid;
    public $noCount;

    /**
     * {@inheritdoc}
     */
    public function getDefaultValues(): array
    {
        return [
            'test'     => 1,
            'noVar'    => 'default',
            'bool'     => true,
            'dateTime' => new \DateTime('2017-01-01'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getExampleValues(): array
    {
        return [
            'test'          => 5,
            'noDescription' => [1, 2, 3, 4, 5],
            'bool'          => false,
        ];
    }
}