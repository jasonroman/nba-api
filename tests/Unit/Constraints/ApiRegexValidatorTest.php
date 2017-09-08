<?php declare(strict_types=1);

namespace JasonRoman\NbaApi\Tests\Unit\Constraints;

use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;
use JasonRoman\NbaApi\Constraints\ApiChoice;
use JasonRoman\NbaApi\Constraints\ApiRegex;
use JasonRoman\NbaApi\Constraints\ApiRegexValidator;

/**
 * Unit tests for the ApiRegexValidator validator.
 */
class ApiRegexValidatorTest extends ConstraintValidatorTestCase
{
    protected function createValidator()
    {
        return new ApiRegexValidator();
    }

    /**
     * @expectedException \Symfony\Component\Validator\Exception\UnexpectedTypeException
     * @expectedExceptionMessage Expected argument of type "JasonRoman\NbaApi\Constraints\ApiRegex"
     */
    public function testIncorrectConstraint()
    {
        $this->validator->validate('something', new ApiChoice(['choices' => [1, 2]]));
    }

    /**
     * @expectedException \Symfony\Component\Validator\Exception\UnexpectedTypeException
     * @expectedExceptionMessage Expected argument of type "string", "array" given
     */
    public function testInvalidValueNotScalar()
    {
        $this->validator->validate(['not', 'scalar'], new ApiRegex(['pattern' => '/test/']));
    }

    /**
     * @expectedException \Symfony\Component\Validator\Exception\UnexpectedTypeException
     * @expectedExceptionMessage Expected argument of type "string", "DateTime" given
     */
    public function testInvalidValueObjectNoToString()
    {
        $this->validator->validate(new \DateTime(), new ApiRegex(['pattern' => '/test/']));
    }

    public function testInvalidPattern()
    {
        $validPattern = '/^[0-9]+?/';

        $constraint = new ApiRegex(['pattern' => $validPattern]);

        $this->validator->validate('***', $constraint);

        // trickier to test the 'param' passed unless coming from a class; this should suffice
        $this->buildViolation($constraint->message)
            ->setParameter('{{ param }}', null)
            ->setParameter('{{ regex }}', $validPattern)
            ->assertRaised();
    }

    public function testNothingToValidate()
    {
        $this->validator->validate(null, new ApiRegex(['pattern' => '/test/']));
        $this->assertNoViolation();
    }

    public function testValidPattern()
    {
        $validPattern = '/^[A-Za-z0-9]+?/';

        $this->validator->validate('S0m3Num3rsAndL3tt3rs', new ApiRegex(['pattern' => $validPattern]));
        $this->assertNoViolation();
    }
}