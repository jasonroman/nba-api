<?php declare(strict_types=1);

namespace JasonRoman\NbaApi\Tests\Unit\Constraints;

use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;
use JasonRoman\NbaApi\Constraints\ApiRegex;
use JasonRoman\NbaApi\Constraints\ApiChoiceValidator;
use JasonRoman\NbaApi\Constraints\ApiChoice;

/**
 * Unit tests for the ApiChoiceValidator validator.
 */
class ApiChoiceValidatorTest extends ConstraintValidatorTestCase
{
    protected function createValidator()
    {
        return new ApiChoiceValidator();
    }

    /**
     * @expectedException \Symfony\Component\Validator\Exception\UnexpectedTypeException
     * @expectedExceptionMessage Expected argument of type "JasonRoman\NbaApi\Constraints\ApiChoice"
     */
    public function testIncorrectConstraint()
    {
        $this->validator->validate('something', new ApiRegex(['pattern' => '/test/']));
    }

    /**
     * @expectedException \Symfony\Component\Validator\Exception\ConstraintDefinitionException
     * @expectedExceptionMessage The ApiChoice constraint must specify "choices" as an array
     */
    public function testInvalidConstraint()
    {
        $this->validator->validate('something', new ApiChoice(['choices' => 'not an array']));
    }

    public function testInvalidChoices()
    {
        $validChoices = [1, 2];

        $constraint = new ApiChoice(['choices' => $validChoices]);

        $this->validator->validate('invalid', $constraint);

        // trickier to test the 'param' passed unless coming from a class; this should suffice
        $this->buildViolation($constraint->message)
            ->setParameter('{{ param }}', null)
            ->setParameter('{{ choices }}', "'".implode("','", $validChoices)."'")
            ->assertRaised();
    }

    public function testNothingToValidate()
    {
        $this->validator->validate(null, new ApiChoice(['choices' => [1, 2]]));
        $this->assertNoViolation();
    }

    public function testValidChoices()
    {
        $validChoices = [1, 2];

        $this->validator->validate(1, new ApiChoice(['choices' => $validChoices]));
        $this->assertNoViolation();

        $this->validator->validate(2, new ApiChoice(['choices' => $validChoices]));
        $this->assertNoViolation();
    }
}