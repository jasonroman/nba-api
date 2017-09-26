<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Constraints\ApiChoice;
use JasonRoman\NbaApi\Constraints\ApiRegex;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Uuid;

/**
 * Class to retrieve information about a particular property (parameter) of a request.
 */
class RequestPropertyUtility
{
    const DEFAULT_DATETIME_FORMAT = 'Y-m-d';

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

    /**
     * Get the doc block description.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->docBlockUtility->getDescription($this->property->getDocComment());
    }

    /**
     * Get the default value.
     *
     * @return mixed
     */
    public function getDefaultValue()
    {
        return $this->request::getDefaultValue($this->propertyName);
    }

    /**
     * Get the example value.
     *
     * @return mixed
     */
    public function getExampleValue()
    {
        return $this->request::getExampleValue($this->propertyName);
    }

    /**
     * Get the default value as a string.
     *
     * @return string
     */
    public function getDefaultValueAsString(): string
    {
        return self::getStringValue($this->getDefaultValue());
    }

    /**
     * Get the example value as a string.
     *
     * @return string
     */
    public function getExampleValueAsString(): string
    {
        return self::getStringValue($this->getExampleValue());
    }

    /**
     * Get the default value as a string for showing code.
     *
     * @return string
     */
    public function getDefaultValueAsCode(): string
    {
        return self::getStringValueAsCode($this->getDefaultValue());
    }

    /**
     * Get the example value as a string for showing code.
     *
     * @return string
     */
    public function getExampleValueAsCode(): string
    {
        return self::getStringValueAsCode($this->getExampleValue());
    }

    /**
     * Get whether the param is required.
     *
     * @return bool
     */
    public function isRequired(): bool
    {
        return (
            $this->docBlockUtility->getConstraint($this->property, NotBlank::class) ||
            $this->docBlockUtility->getConstraint($this->property, NotNull::class)
        );
    }

    /**
     * Get whether the param is an array; having an All Constraint.
     *
     * @return bool
     */
    public function isArray(): bool
    {
        return (bool) $this->docBlockUtility->getConstraint($this->property, All::class, false);
    }

    /**
     * Get whether the NotBlank assertion exists on the param.
     *
     * @return bool
     */
    public function getNotBlank(): bool
    {
        return (bool) $this->docBlockUtility->getConstraint($this->property, NotBlank::class);
    }

    /**
     * Get whether the NotNull assertion exists on the param.
     *
     * @return bool
     */
    public function getNotNull(): bool
    {
        return (bool) $this->docBlockUtility->getConstraint($this->property, NotNull::class);
    }

    /**
     * Get the Regex assertion pattern if it exists.
     *
     * @return string|null
     */
    public function getRegex()
    {
        /** @var ApiRegex $constraint */
        if ($constraint = $this->docBlockUtility->getConstraint($this->property, ApiRegex::class)) {
            return $constraint->pattern;
        }
    }

    /**
     * Get the array of choices from the Choices assertion if it exists.
     *
     * @return array|null
     */
    public function getChoices()
    {
        /** @var ApiChoice $constraint */
        if ($constraint = $this->docBlockUtility->getConstraint($this->property, ApiChoice::class)) {
            return $constraint->choices;
        }
    }

    /**
     * Get the param variable type from the Type assertion if it exists (adds '[]' if this is an array).
     *
     * @return string|null
     */
    public function getType()
    {
        /** @var Type $constraint */
        if ($constraint = $this->docBlockUtility->getConstraint($this->property, Type::class)) {
            return $constraint->type.($this->isArray() ? '[]' : '');
        }
    }

    /**
     * Get the minimum/maximum range from the Range assertion if it exists.
     *
     * @return array|null
     */
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

    /**
     * Get the UUID type from the Uuid assertion if it exists.
     *
     * @return string|null
     */
    public function getUuid()
    {
        /** @var Uuid $constraint */
        if ($constraint = $this->docBlockUtility->getConstraint($this->property, Uuid::class)) {
            return ($constraint->strict) ? self::UUID_CONSTRAINT_STRICT_VALUE : self::UUID_CONSTRAINT_NON_STRICT_VALUE;
        }
    }

    /**
     * Get the minimum/maximum count from the Count assertion if it exists.
     *
     * @return array|null
     */
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

    /**
     * Get string output based on the value.
     *
     * @param mixed $value
     * @return string
     */
    public static function getStringValue($value): string
    {
        if ($value instanceof \DateTime) {
            return $value->format(self::DEFAULT_DATETIME_FORMAT);
        } elseif (is_bool($value)) {
            return $value ? 'true' : 'false';
        } elseif (is_array($value)) {
            return implode(', ', array_map('self::getStringValue', $value));
        }

        return (string) $value;
    }

    /**
     * Get string display output for showing code based on the value.
     *
     * @param mixed $value
     * @return string
     */
    public static function getStringValueAsCode($value): string
    {
        if ($value instanceof \DateTime) {
            return "new \DateTime('".$value->format(self::DEFAULT_DATETIME_FORMAT)."')";
        } elseif (is_bool($value)) {
            return $value ? 'true' : 'false';
        } elseif (is_array($value)) {
            return '['.implode(', ', array_map('self::getStringValueAsCode', $value)).']';
        } elseif (is_null($value)) {
            return 'null';
        } elseif (is_int($value) || is_float($value)) {
            return (string) $value;
        }

        return "'".(string) $value."'";
    }
}