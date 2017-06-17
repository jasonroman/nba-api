<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Request\Params\AbstractParam;

abstract class AbstractApiRequest
{
    const DEFAULT_METHOD_PREFIX = 'getDefault';
    const PARAMS_DEFAULT_METHOD = 'getDefaultValue';
    const PARAMS_DIR            = 'Params';
    const PARAMS_SUFFIX         = 'Param';

    /**
     * Retrieve the endpoint in the URL that gets added to the base URL.
     * @return string
     */
    abstract public function getEndpoint();

    /**
     * Convert an API Request to an array that can be passed as a Guzzle 'query'.
     *
     * @return array
     */
    public function toArray()
    {
        return (array) $this;
    }

    /**
     * @param array $array
     * @return AbstractApiRequest
     */
    public static function fromArray(array $array)
    {
        $calledClass = get_called_class();
        $class       = new $calledClass;

        // get the reflection class and all public properties of the class
        $reflectionClass  = (new \ReflectionObject($class));
        $publicProperties = $reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC);

        foreach ($publicProperties as $property) {
            $propertyName = $property->getName();

            // use the property if it was passed in from the array
            if (isset($array[$propertyName])) {
                $class->$propertyName = $array[$propertyName];

                continue;
            }

            // otherwise, check if the request class has a getDefault<PropertyName>() method and use that
            $defaultMethod = self::DEFAULT_METHOD_PREFIX.ucfirst($propertyName);

            if (method_exists($class, $defaultMethod)) {
                $class->$propertyName = $class->$defaultMethod();

                continue;
            }

            // otherwise, check if the property has its own corresponding param class and use that default
            $paramsClassFqcn = self::getParamsClass($reflectionClass, $propertyName);

            if (!class_exists($paramsClassFqcn)) {
                continue;
            }

            $paramsClass = new $paramsClassFqcn;

            // make sure the class is a param type
            if (!$paramsClass instanceof AbstractParam) {
                continue;
            }

            // call the method to get the default value for this property
            $class->$propertyName = $paramsClass->{self::PARAMS_DEFAULT_METHOD}();
        }

        return $class;
    }

    /**
     * Get the Params class associated with a particular property.
     * The params class is one level up, contains the property name, and ends with the parameters suffix
     *
     * @param \ReflectionObject $class
     * @param string $propertyName
     * @return string
     */
    private static function getParamsClass(\ReflectionObject $class, string $propertyName)
    {
        return $class->getNamespaceName().'\\'.self::PARAMS_DIR.'\\'.ucfirst($propertyName).self::PARAMS_SUFFIX;
    }
}