<?php declare(strict_types=1);

namespace JasonRoman\NbaApi\Tests\Unit\Constraints;

use JasonRoman\NbaApi\Constraints\ApiChoice;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for the ApiChoice constraint.
 */
class ApiChoiceTest extends TestCase
{
    /**
     * @expectedException \Symfony\Component\Validator\Exception\MissingOptionsException
     * @expectedExceptionMessage The options "choices" must be set for constraint
     */
    public function testMissingOptionsException()
    {
        new ApiChoice();
    }

    public function testGetDefaultOption()
    {
        $constraint = new ApiChoice(['choices' => ['choice1', 'choice2']]);

        $this->assertSame(ApiChoice::DEFAULT_OPTION, $constraint->getDefaultOption());
    }

    public function testGetRequiredOptions()
    {
        $constraint = new ApiChoice(['choices' => ['choice1', 'choice2']]);

        $this->assertSame([ApiChoice::DEFAULT_OPTION], $constraint->getRequiredOptions());
    }
}