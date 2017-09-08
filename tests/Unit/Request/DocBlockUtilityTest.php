<?php

namespace JasonRoman\NbaApi\Tests\Unit\Request;

use JasonRoman\NbaApi\Constraints\ApiRegex;
use JasonRoman\NbaApi\Request\DocBlockUtility;
use JasonRoman\NbaApi\Tests\Unit\Request\Fixtures\TestRequest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Type;

class DocBlockUtilityTest extends TestCase
{
    /**
     * @var DocBlockUtility
     */
    protected $docBlockUtility;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->docBlockUtility = new DocBlockUtility();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($this->docBlockUtility);
    }

    public function testGetDescription()
    {
        $property = new \ReflectionProperty(TestRequest::class, 'test');

        $this->assertSame(
            "Here is\na description.",
            $this->docBlockUtility->getDescription($property->getDocComment())
        );
    }

    public function testGetDescriptionNotExists()
    {
        $property = new \ReflectionProperty(TestRequest::class, 'noDescription');

        $this->assertSame('', $this->docBlockUtility->getDescription($property->getDocComment()));
    }

    public function testGetVar()
    {
        $propertyTest = new \ReflectionProperty(TestRequest::class, 'test');
        $this->assertSame('\DateTime', $this->docBlockUtility->getVar($propertyTest->getDocComment()));

        $propertyNoDescription = new \ReflectionProperty(TestRequest::class, 'noDescription');
        $this->assertSame('int', $this->docBlockUtility->getVar($propertyNoDescription->getDocComment()));
    }

    public function testGetVarNotExists()
    {
        $property = new \ReflectionProperty(TestRequest::class, 'noVar');
        $this->assertSame('', $this->docBlockUtility->getDescription($property->getDocComment()));
    }

    public function testGetConstraintSingle()
    {
        $property = new \ReflectionProperty(TestRequest::class, 'test');

        $notBlankConstraint = $this->docBlockUtility->getConstraint($property, NotBlank::class);
        $this->assertInstanceOf(NotBlank::class, $notBlankConstraint);

        /** @var Type $typeConstraint */
        $typeConstraint = $this->docBlockUtility->getConstraint($property, Type::class);
        $this->assertInstanceOf(Type::class, $typeConstraint);
        $this->assertSame('\DateTime', $typeConstraint->type);

        /** @var ApiRegex $regexConstraint */
        $regexConstraint = $this->docBlockUtility->getConstraint($property, ApiRegex::class);
        $this->assertInstanceOf(ApiRegex::class, $regexConstraint);
        $this->assertSame(TestRequest::TEST_REGEX, $regexConstraint->pattern);
    }

    public function testGetConstraintSingleNotFound()
    {
        $property = new \ReflectionProperty(TestRequest::class, 'all');

        $this->assertNull($this->docBlockUtility->getConstraint($property, NotBlank::class, false));
    }

    public function testGetConstraintSingleFoundFromAll()
    {
        $property = new \ReflectionProperty(TestRequest::class, 'all');

        $notNullConstraint = $this->docBlockUtility->getConstraint($property, NotNull::class);
        $this->assertInstanceOf(NotNull::class, $notNullConstraint);
    }

    public function testGetConstraintFromAllNotFound()
    {
        $property = new \ReflectionProperty(TestRequest::class, 'test');

        $this->assertNull($this->docBlockUtility->getConstraintFromAll($property, NotNull::class));
    }

    public function testGetConstraintFromAll()
    {
        $property = new \ReflectionProperty(TestRequest::class, 'all');

        // not found, this is a Count on the main property, not within the All constraint
        $this->assertNull($this->docBlockUtility->getConstraintFromAll($property, Count::class));

        $notNullConstraint = $this->docBlockUtility->getConstraint($property, NotNull::class);
        $this->assertInstanceOf(NotNull::class, $notNullConstraint);

        /** @var Type $typeConstraint */
        $typeConstraint = $this->docBlockUtility->getConstraint($property, Type::class);
        $this->assertInstanceOf(Type::class, $typeConstraint);
        $this->assertSame('int', $typeConstraint->type);

        /** @var Range $rangeConstraint */
        $rangeConstraint = $this->docBlockUtility->getConstraint($property, Range::class);
        $this->assertInstanceOf(Range::class, $rangeConstraint);
        $this->assertSame(1, $rangeConstraint->min);
        $this->assertSame(5, $rangeConstraint->max);
    }
}