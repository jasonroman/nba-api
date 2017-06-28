<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Params\AbstractParam;

abstract class AbstractApiRequest
{
    const PARAM_DEFAULT_METHOD     = 'getDefaultValue';
    const CONVERT_TO_STRING_METHOD = 'getStringValue';

    /**
     * Retrieve the endpoint in the URL that gets added to the base URL.
     *
     * @return string
     */
    abstract public function getEndpoint() : string;

    /**
     * Get the request type - essentially where the request is coming from ('Data', 'Nba', 'Stats',)
     */
    abstract public function getRequestType() : string;

    /**
     * Get the default parameter values for this request.
     *
     * @return array
     */
    public function getDefaultValues() : array
    {
        return [];
    }

    /**
     * Convert an API Request to an array that can be passed as a Guzzle 'query'.
     *
     * @return array
     */
    public function toArray() : array
    {
        return (array) $this;
    }

    /**
     * @param array $array
     * @return AbstractApiRequest
     */
    public static function fromArray(array $array) : self
    {
        $calledClass = get_called_class();

        /** @var AbstractApiRequest $class */
        $class = new $calledClass;

        // get the reflection class and all public properties of the class
        $reflectionClass  = (new \ReflectionObject($class));
        $publicProperties = $reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC);

        /**
         * loop through each public property of the class and set the value according to the priority;
         * if a value is found at any of these steps, set the value for the property and continue to the next property;
         * note that each param class does not have to specifically define this function; it rolls up to the base class
         *
         * Priority:
         *  1. passed in directly to this function (user-defined)
         *  2. set in the getDefaultValues() method of the request class
         *  3. set in the getDefaultValue() method of the corresponding Request Type -> Param class
         *  4. set in the getDefaultValue() method of the global Request Type -> Param class
         */
        foreach ($publicProperties as $property) {
            $propertyName = $property->getName();

            // use the property if it was passed in to this method
            if (isset($array[$propertyName])) {
                $class->$propertyName = $array[$propertyName];

                continue;
            }

            // use the property if it exists in the getDefaultValues() method of the request class
            $requestClassDefaultValues = $class->getDefaultValues();

            if (isset($requestClassDefaultValues[$propertyName])) {
                $class->$propertyName = $requestClassDefaultValues[$propertyName];

                continue;
            }

            // use the property if it exists in the getDefaultValue() method of the Request Type -> Param class
            // for example, for a Data request, this looks in JasonRoman\NbaApi\Params\Data\<Property>Param
            $requestTypeFqcn = AbstractParam::getRequestTypeParamClassFqcn($class->getRequestType(), $propertyName);

            // make sure the class exists and is an AbstractParam type
            if (class_exists($requestTypeFqcn) && is_subclass_of($requestTypeFqcn, AbstractParam::class)) {
                $requestTypeDefaultValue = $requestTypeFqcn::{self::PARAM_DEFAULT_METHOD}();

                // if the default is anything other than null, set the value
                if (!is_null($requestTypeDefaultValue)) {
                    $class->$propertyName = $requestTypeDefaultValue;

                    continue;
                }
            }

            // use the property if it exists in the getDefaultValue() method of the base Param class
            // for example, for a Data request, this looks in JasonRoman\NbaApi\Params\<Property>Param
            $paramFqcn = AbstractParam::getParamClassFqcn($propertyName);

            // make sure the class exists and is an AbstractParam type
            if (class_exists($paramFqcn) && is_subclass_of($paramFqcn, AbstractParam::class)) {
                $defaultValue = $paramFqcn::{self::PARAM_DEFAULT_METHOD}();

                // if the default is anything other than null, set the value
                if (!is_null($defaultValue)) {
                    $class->$propertyName = $defaultValue;

                    continue;
                }
            }
        }

        return $class;
    }

    public function convertParamsToString()
    {
        // get the reflection class and all public properties of the class
        $reflectionClass  = (new \ReflectionObject($this));
        $publicProperties = $reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC);

        /**
         * loop through each public property of the class and convert the value to string according to the priority;
         * if a param is found at any of these steps, use the the conversion function in that param class;
         * note that each param class does not have to specifically define this function; it rolls up to the base class
         *
         * Priority:
         *  1. use the getStringValue() method of the corresponding Request Type -> Param class
         *  2. use the getStringValue() method of the global Request Type -> Param class
         *  3. call the general AbstractParam::getStringValue() method
         */
        foreach ($publicProperties as $property) {
            $propertyName = $property->getName();

            // use the property if it exists in the getDefaultValue() method of the Request Type -> Param class
            // for example, for a Data request, this looks in JasonRoman\NbaApi\Params\Data\<Property>Param
            $requestTypeFqcn = AbstractParam::getRequestTypeParamClassFqcn($this->getRequestType(), $propertyName);

            // make sure the class exists and is an AbstractParam type
            if (class_exists($requestTypeFqcn) && is_subclass_of($requestTypeFqcn, AbstractParam::class)) {
                $this->$propertyName = $requestTypeFqcn::{self::CONVERT_TO_STRING_METHOD}($this->$propertyName);

                continue;
            }

            // use the property if it exists in the getDefaultValue() method of the base Param class
            // for example, for a Data request, this looks in JasonRoman\NbaApi\Params\<Property>Param
            $paramFqcn = AbstractParam::getParamClassFqcn($propertyName);

            // make sure the class exists and is an AbstractParam type
            if (class_exists($paramFqcn) && is_subclass_of($paramFqcn, AbstractParam::class)) {
                $this->$propertyName = $paramFqcn::{self::CONVERT_TO_STRING_METHOD}($this->$propertyName);

                continue;
            }

            // if got here, no specific param class exists, so just cast to string
            $this->$propertyName = AbstractParam::getStringValue($this->$propertyName);
        }
    }
}