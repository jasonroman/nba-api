<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Draft;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;

/**
 * Get basic information on all picks of the draft.
 */
class DraftPickRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/draft/{year}/draft_pick.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2017)
     *
     * @var int
     */
    public $year;

    /**
     * {@inheritdoc}
     */
    public function getExampleValues(): array
    {
        return [
            'year' => 2017,
        ];
    }
}