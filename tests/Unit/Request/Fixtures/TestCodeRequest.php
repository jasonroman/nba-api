<?php

namespace JasonRoman\NbaApi\Tests\Unit\Request\Fixtures;

class TestCodeRequest extends AbstractTestRequest
{
    public $dateTime;
    public $boolTrue;
    public $boolFalse;
    public $array;
    public $null;
    public $int;
    public $float;
    public $string;

    /**
     * {@inheritdoc}
     */
    public static function getDefaultValues(): array
    {
        return [
            'dateTime' => new \DateTime(),
            'boolTrue' => true,
            'array'    => [1, '2', false],
            'int'      => 5,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getExampleValues(): array
    {
        return [
            'boolFalse' => false,
            'float'     => 5.5,
            'null'      => null,
            'string'    => 'string',
        ];
    }
}