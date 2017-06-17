<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

use Symfony\Component\Validator\Validation;

/**
 * Base Request Parameter.
 */
class AbstractParam
{
    /**
     * All types have a single value.
     *
     * @var mixed
     */
    public $value;

    /**
     * Set the value.
     *
     * @param mixed $value
     * @throws \InvalidArgumentException
     */
    public function __construct($value)
    {
        if (static::FORMAT && !preg_match(static::FORMAT, $value)) {
            $this->throwInvalidType();
        }

        $this->value = $value;
    }

    public function validate()
    {
        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator()
        ;

        $violations = $validator->validate($this->value);
        var_dump($violations);
    }

    /**
     * Returns the short name of the extended class
     *
     * @return string
     */
    public function getShortName() : string
    {
        return (new \ReflectionClass($this))->getShortName();
    }

    /**
     * @param string $validType
     * @throws \InvalidArgumentException
     */
    public function throwInvalidType($validType = '')
    {
        $invalidString = $this->getShortName().' is not valid.';

        if ($validType) {
            $invalidString .= ' Must be of type '.$validType;
        }

        if (static::FORMAT) {
            $invalidString .= ' Must match regular expression '.static::FORMAT;
        }

        throw new \InvalidArgumentException($invalidString);
    }
}