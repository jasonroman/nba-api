<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Params\AbstractParam;

abstract class AbstractNbaApiRequest implements NbaApiRequestInterface
{
    const BASE_NAMESPACE = 'JasonRoman\NbaApi\Request\\';
    const REQUEST_SUFFIX = 'Request';

    const PARAM_DEFAULT_METHOD     = 'getDefaultValue';
    const CONVERT_TO_STRING_METHOD = 'getStringValue';

    // default implementation uses {<param>} as a placeholder;
    // for example /data/{gameId}/scores will replace {gameId} with the value of $gameId in the request class
    const PLACEHOLDER_START = '{';
    const PLACEHOLDER_END   = '}';

    // default regex looks like the following: /{\K[^}]*(?=})/m
    const REGEX_GET_ENDPOINT_VARS = '/'.
        self::PLACEHOLDER_START.'\K[^'.self::PLACEHOLDER_END.']*(?='.self::PLACEHOLDER_END.')'.
    '/m';

    /**
     * {@inheritdoc}
     */
    public function getMethod() : string
    {
        return 'GET';
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestType() : string
    {
        return static::getDomain();
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseType() : string
    {
        // if the format parameter exists, use that as the response type, otherwise use the request's default
        if (isset($this->format)) {
            return $this->format;
        }

        return static::DEFAULT_RESPONSE_TYPE;
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpoint() : string
    {
        // get the endpoint from the request class
        $endpoint = static::ENDPOINT;

        // remove duplicates
        $endpointVars = $this->getEndpointVars();

        // loop through each endpoint variable and replace the class member value in the endpoint string
        foreach ($endpointVars as $endpointVar) {
            if (is_null($this->$endpointVar)) {
                throw new \Exception(sprintf("Missing class member value '%s' for request", $endpointVar));
            }

            $endpoint = str_replace('{'.$endpointVar.'}', $this->$endpointVar, $endpoint);
        }

        return $endpoint;
    }

    /**
     * Retrieve the endpoint variables in the URL that get added to the base URL.
     *
     * @return string[]
     */
    public function getEndpointVars() : array
    {
        // get all endpoint variables that need replacing
        preg_match_all(self::REGEX_GET_ENDPOINT_VARS, static::ENDPOINT, $endpointVars);

        // remove duplicates and return
        return array_unique($endpointVars[0]);
    }

    /**
     * {@inheritdoc}
     */
    public function getQueryParams() : array
    {
        $queryParams  = [];
        $endpointVars = $this->getEndpointVars();

        foreach ($this->toArray() as $key => $value) {
            if (!in_array($key, $endpointVars)) {
                $queryParams[$key] = $value;
            }
        }

        return $queryParams;
    }

    /**
     * Retrieve the query param keys, which are all params minus any that occur as placeholders in the endpoint.
     *
     * @return string[]
     */
    public function getQueryParamKeys() : array
    {
        return array_keys($this->getQueryParams());
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultValues() : array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function fromArray(array $array = []) : NbaApiRequestInterface
    {
        $calledClass = get_called_class();

        /** @var AbstractNbaApiRequest $class */
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

    /**
     * {@inheritdoc}
     */
    public function toArray() : array
    {
        return (array) $this;
    }

    /**
     * {@inheritdoc}
     */
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
         *  2. use the getStringValue() method of the corresponding global Param class
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
            $this->$propertyName = AbstractParam::{self::CONVERT_TO_STRING_METHOD}($this->$propertyName);
        }
    }

    /**
     * The following functions are all helper functions that get various properties/meta information about a request.
     * All requests in this library have a domain, section, and category which can be determined from the namespace.
     */

    /**
     * Get the namespace left over after removing the base namespace.  All request namespaces should be in this format:
     *
     * self::BASE_NAMESPACE\<Domain>\<Section>\<Category>
     *
     * @return string
     * @throws \Exception if the request does not have the base namespace
     */
    public static function getMainNamespace(): string
    {
        if (substr(static::class, 0, strlen(self::BASE_NAMESPACE)) !== self::BASE_NAMESPACE) {
            throw new \Exception('Request must have root namespace of '.self::BASE_NAMESPACE);
        }

        // should never reach here, but just in case...
        return substr(static::class, strlen(self::BASE_NAMESPACE));
    }

    /**
     * Get the namespace parts as an array after removing the base namespace.
     *
     * @return array
     */
    public static function getMainNamespaceParts(): array
    {
        return explode('\\', self::getMainNamespace());
    }

    /**
     * Get the request domain given the following format:
     *  self::BASE_NAMESPACE\<Domain>\<Section>\<Category>\<RequestName>Request
     *
     * @return string
     */
    public static function getDomain(): string
    {
        return self::getMainNamespaceParts()[0];
    }

    /**
     * Get the request section given the following format:
     *  self::BASE_NAMESPACE\<Domain>\<Section>\<Category>\<RequestName>Request
     *
     * @return string
     */
    public static function getSection(): string
    {
        return self::getMainNamespaceParts()[1];
    }

    /**
     * Get the request category given the following format:
     *  self::BASE_NAMESPACE\<Domain>\<Section>\<Category>\<RequestName>Request
     *
     * @return string
     */
    public static function getCategory(): string
    {
        return self::getMainNamespaceParts()[2];
    }

    /**
     * Get the request name given the following format:
     *  self::BASE_NAMESPACE\<Domain>\<Section>\<Category>\<RequestName>Request
     *
     * @return string
     * @throws \Exception if the request class does not end with self::REQUEST_SUFFIX
     */
    public static function getRequestName(): string
    {
        if (substr(static::class, -strlen(self::REQUEST_SUFFIX)) !== self::REQUEST_SUFFIX) {
            throw new \Exception('Request class name must end with '.self::REQUEST_SUFFIX);
        }

        return substr(self::getMainNamespaceParts()[3], 0, strlen(self::REQUEST_SUFFIX));
    }

    /**
     * Get the 'short name' of the request class - the class name without namespaces.
     *
     * @return string
     */
    public static function getClassShortName(): string
    {
        return (new \ReflectionClass(static::class))->getShortName();
    }
}