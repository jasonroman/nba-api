<?php

namespace JasonRoman\NbaApi\Request;

use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Uuid;
use JasonRoman\NbaApi\Constraints\ApiChoice;
use JasonRoman\NbaApi\Constraints\ApiRegex;

class RequestPropertyUtility
{
    const ARRAY_PREFIX                     = 'Array of ';
    const DATE_CONSTRAINT_VALUE            = '\DateTime or string in YYYY-MM-DD format';
    const UUID_CONSTRAINT_STRICT_VALUE     = 'UUID (Strict RFC 4122)';
    const UUID_CONSTRAINT_NON_STRICT_VALUE = 'UUID (non-strict)';

    /**
     * @var DocBlockUtility
     */
    protected $docBlockUtility;

    /**
     * @var AbstractNbaApiRequest
     */
    protected $request;

    /**
     * @var string
     */
    protected $propertyName;

    /**
     * @var \ReflectionProperty
     */
    protected $property;

    /**
     * @param AbstractNbaApiRequest $request
     * @param string $propertyName
     */
    public function __construct(AbstractNbaApiRequest $request, $propertyName)
    {
        $this->docBlockUtility = new DocBlockUtility();
        $this->request         = $request;
        $this->propertyName    = $propertyName;
        $this->property        = new \ReflectionProperty($request, $propertyName);
    }

    public function getDescription()
    {
        return $this->docBlockUtility->getDescription($this->property->getDocComment());
    }

    public function getDefaultValue()
    {
        return $this->getStringOutput(AbstractNbaApiRequest::getDefaultValue($this->request, $this->propertyName));
    }

    public function getExampleValue()
    {
        return $this->getStringOutput(AbstractNbaApiRequest::getExampleValue($this->request, $this->propertyName));
    }

    /**
     * @param mixed $value
     * @return string
     */
    public function getStringOutput($value)
    {
        if ($value instanceof \DateTime) {
            return $value->format('Y-m-d');
        } elseif (is_bool($value)) {
            return $value ? 'true' : 'false';
        } elseif (is_array($value)) {
            return implode(', ', $value);
        }

        return (string) $value;
    }

    public function isRequired()
    {
        return (
            $this->docBlockUtility->getConstraint($this->property, NotBlank::class) ||
            $this->docBlockUtility->getConstraint($this->property, NotNull::class)
        );
    }

    public function isArray()
    {
        return (bool) $this->docBlockUtility->getConstraint($this->property, All::class, false);
    }

    /**
     * @return string|null
     */
    public function getNotBlank()
    {
        return (bool) $this->docBlockUtility->getConstraint($this->property, NotBlank::class);
    }

    /**
     * @return string|null
     */
    public function getNotNull()
    {
        return (bool) $this->docBlockUtility->getConstraint($this->property, NotNull::class);
    }

    /**
     * @return string|null
     */
    public function getRegex()
    {
        /** @var ApiRegex $constraint */
        if ($constraint = $this->docBlockUtility->getConstraint($this->property, ApiRegex::class)) {
            return $constraint->pattern;
        }
    }

    public function getChoices()
    {
        /** @var ApiChoice $constraint */
        if ($constraint = $this->docBlockUtility->getConstraint($this->property, ApiChoice::class)) {
            return $constraint->choices;
        }
    }

    public function getType()
    {
        /** @var Type $constraint */
        if ($constraint = $this->docBlockUtility->getConstraint($this->property, Type::class)) {
            return $constraint->type;
        }
    }

    public function getRange()
    {
        /** @var Range $constraint */
        if ($constraint = $this->docBlockUtility->getConstraint($this->property, Range::class)) {
            return [
                'min' => $constraint->min,
                'max' => $constraint->max,
            ];
        }
    }

    public function getDate()
    {
        /** @var Date $constraint */
        if ($constraint = $this->docBlockUtility->getConstraint($this->property, Date::class)) {
            return self::DATE_CONSTRAINT_VALUE;
        }
    }

    public function getUuid()
    {
        /** @var Uuid $constraint */
        if ($constraint = $this->docBlockUtility->getConstraint($this->property, Uuid::class)) {
            return ($constraint->strict) ? self::UUID_CONSTRAINT_STRICT_VALUE : self::UUID_CONSTRAINT_NON_STRICT_VALUE;
        }
    }

    public function getCount()
    {
        /** @var Count $constraint */
        if ($constraint = $this->docBlockUtility->getConstraint($this->property, Count::class)) {
            return [
                'min' => $constraint->min,
                'max' => $constraint->max,
            ];
        }
    }
}