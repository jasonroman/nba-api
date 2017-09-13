<?php declare(strict_types=1);

namespace JasonRoman\NbaApi\Tests\Unit\Constraints;

use JasonRoman\NbaApi\Constraints\ApiRegex;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for the ApiRegex constraint.
 */
class ApiRegexTest extends TestCase
{
    /**
     * @expectedException \Symfony\Component\Validator\Exception\MissingOptionsException
     * @expectedExceptionMessage The options "pattern" must be set for constraint
     */
    public function testMissingOptionsException()
    {
        new ApiRegex();
    }

    public function testGetDefaultOption()
    {
        $constraint = new ApiRegex(['pattern' => ['/^someregex?/']]);

        $this->assertSame(ApiRegex::DEFAULT_OPTION, $constraint->getDefaultOption());
    }

    public function testGetRequiredOptions()
    {
        $constraint = new ApiRegex(['pattern' => ['/^someregex?/']]);

        $this->assertSame([ApiRegex::DEFAULT_OPTION], $constraint->getRequiredOptions());
    }
}