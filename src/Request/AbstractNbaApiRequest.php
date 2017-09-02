<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Params\AbstractParam;

abstract class AbstractNbaApiRequest implements NbaApiRequestInterface
{
    const BASE_NAMESPACE = 'JasonRoman\NbaApi\Request';
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
    public function getMethod(): string
    {
        return 'GET';
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestType(): string
    {
        return static::getDomain();
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseType(): string
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
    public function getEndpoint(): string
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
    public function getEndpointVars(): array
    {
        // get all endpoint variables that need replacing
        preg_match_all(self::REGEX_GET_ENDPOINT_VARS, static::ENDPOINT, $endpointVars);

        // remove duplicates and return
        return array_unique($endpointVars[0]);
    }

    /**
     * {@inheritdoc}
     */
    public function getQueryParams(): array
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
    public function getQueryParamKeys(): array
    {
        return array_keys($this->getQueryParams());
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultValues(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function fromArray(array $array = []) : NbaApiRequestInterface
    {
        $calledClass = get_called_class();

        /** @var AbstractNbaApiRequest $request */
        $request = new $calledClass;

        // get all public properties of the request
        $publicProperties = (new \ReflectionObject($request))->getProperties(\ReflectionProperty::IS_PUBLIC);

        /**
         * loop through each public property of the class and set the value according to the following priority;
         *
         * Priority:
         *  1. passed in directly to this function (user-defined)
         *  2. retrieved as a default value
         */
        foreach ($publicProperties as $property) {
            $propertyName = $property->getName();

            // use the property if it was passed in to this method
            if (isset($array[$propertyName])) {
                $request->$propertyName = $array[$propertyName];

                continue;
            }

            // set from the default value
            $request->$propertyName = self::getDefaultValue($request, $propertyName);
        }

        return $request;
    }

    /**
     * Get the default value of a parameter according to the priority, stopping when a default value is found.
     * Note that each param class does not have to specifically define this function; it rolls up to the base class.
     *
     * Priority:
     *  1. set in the getDefaultValues() method of the request class
     *  2. set in the getDefaultValue() method of the corresponding Request Type -> Param class
     *  3. set in the getDefaultValue() method of the global Request Type -> Param class
     *
     * @param AbstractNbaApiRequest $request
     * @param $propertyName
     * @return mixed
     */
    public static function getDefaultValue(AbstractNbaApiRequest $request, $propertyName)
    {
        // use the property if it exists in the getDefaultValues() method of the request class
        $requestDefaultValues = $request->getDefaultValues();

        if (isset($requestDefaultValues[$propertyName])) {
            return $requestDefaultValues[$propertyName];
        }

        // use the property if it exists in the getDefaultValue() method of the Request Type -> Param class
        // for example, for a Data request, this looks in JasonRoman\NbaApi\Params\Data\<Property>Param
        $requestTypeFqcn = AbstractParam::getRequestTypeParamClassFqcn($request->getRequestType(), $propertyName);

        // make sure the class exists and is an AbstractParam type
        if (class_exists($requestTypeFqcn) && is_subclass_of($requestTypeFqcn, AbstractParam::class)) {
            $requestTypeDefaultValue = $requestTypeFqcn::{self::PARAM_DEFAULT_METHOD}();

            // if the default is anything other than null, set the value
            if (!is_null($requestTypeDefaultValue)) {
                return $requestTypeDefaultValue;
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
                return $defaultValue;
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
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

        // loop through each public property of the class and convert the value to string
        foreach ($publicProperties as $property) {
            $propertyName = $property->getName();

            $this->$propertyName = $this->convertParamToString($propertyName);
        }
    }

    /**
     * Get the string value of a parameter according to the priority, stopping when a value is converted.
     * Note that each param class does not have to specifically define this function; it rolls up to the base class.
     *
     * Priority:
     *  1. use the getStringValue() method of the corresponding Request Type -> Param class
     *  2. use the getStringValue() method of the corresponding global Param class
     *  3. call the general AbstractParam::getStringValue() method
     *
     * @param string $propertyName
     */
    public function convertParamToString($propertyName)
    {
        // use the property if it exists in the getDefaultValue() method of the Request Type -> Param class
        // for example, for a Data request, this looks in JasonRoman\NbaApi\Params\Data\<Property>Param
        $requestTypeFqcn = AbstractParam::getRequestTypeParamClassFqcn($this->getRequestType(), $propertyName);

        // make sure the class exists and is an AbstractParam type
        if (class_exists($requestTypeFqcn) && is_subclass_of($requestTypeFqcn, AbstractParam::class)) {
            return $requestTypeFqcn::{self::CONVERT_TO_STRING_METHOD}($this->$propertyName);
        }

        // use the property if it exists in the getDefaultValue() method of the base Param class
        // for example, for a Data request, this looks in JasonRoman\NbaApi\Params\<Property>Param
        $paramFqcn = AbstractParam::getParamClassFqcn($propertyName);

        // make sure the class exists and is an AbstractParam type
        if (class_exists($paramFqcn) && is_subclass_of($paramFqcn, AbstractParam::class)) {
            return $paramFqcn::{self::CONVERT_TO_STRING_METHOD}($this->$propertyName);
        }

        // if got here, no specific param class exists, so just cast to string
        return AbstractParam::{self::CONVERT_TO_STRING_METHOD}($this->$propertyName);
    }

    /**
     * The following functions are all helper functions that get various properties/meta information about a request.
     * All requests in this library have a domain, section, and category which can be determined from the namespace.
     */

    /**
     * Get the base endpoint for display - the base url plus the main endpoint.
     *
     * @return string
     */
    public function getFullBaseEndpoint(): string
    {
        return static::BASE_URI.static::ENDPOINT;
    }

    public function getPublicProperties(): array
    {
        $reflectionClass = new \ReflectionClass($this);

        return $reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC);
    }

    public function getParamNames(): array
    {
        $names = [];

        foreach ($this->getPublicProperties() as $param) {
            //dump($param);
            /** @var \ReflectionProperty $param */
            $names[] = $param->getName();
        }

        return $names;
    }

    public function getParamsInfo(): array
    {
        $paramsInfo = [];

        foreach ($this->getParamNames() as $paramName) {
            $paramsInfo[$paramName] = $this->getParamInfo($paramName);
        }

        return $paramsInfo;
    }

    public function getParamInfo($paramName)
    {
        $propertyUtility = new RequestPropertyUtility($this, $paramName);

        return [
            'is_required'   => $propertyUtility->isRequired(),
            'is_array'      => $propertyUtility->isArray(),
            'is_not_blank'  => $propertyUtility->getNotBlank(),
            'is_not_null'   => $propertyUtility->getNotNull(),
            'description'   => $propertyUtility->getDescription(),
            'type'          => $propertyUtility->getType(),
            'default_value' => $propertyUtility->getDefaultValue(),
            'choices'       => $propertyUtility->getChoices(),
            'regex'         => $propertyUtility->getRegex(),
            'range'         => $propertyUtility->getRange(),
            'count'         => $propertyUtility->getCount(),
            'date'          => $propertyUtility->getDate(),
            'uuid'          => $propertyUtility->getUuid(),
        ];
    }

    /**
     * Get the namespace left over after removing the base namespace.  All request namespaces should be in this format:
     *
     * self::BASE_NAMESPACE\<Domain>\<Section>\<Category>
     *
     * @return string
     * @throws \Exception if the request does not have the base namespace
     */
    public static function getMainNamespaceAndRequest(): string
    {
        if (substr(static::class, 0, strlen(self::BASE_NAMESPACE)) !== self::BASE_NAMESPACE) {
            throw new \Exception('Request must have root namespace of '.self::BASE_NAMESPACE);
        }

        return substr(static::class, strlen(self::BASE_NAMESPACE) + 1);
    }

    /**
     * Get the namespace parts as an array after removing the base namespace.
     *
     * @return array
     */
    public static function getMainNamespaceAndRequestParts(): array
    {
        return explode('\\', self::getMainNamespaceAndRequest());
    }

    /**
     * Get the request domain given the following format:
     *  self::BASE_NAMESPACE\<Domain>\<Section>\<Category>\<RequestName>Request
     *
     * @return string
     */
    public static function getDomain(): string
    {
        return self::getMainNamespaceAndRequestParts()[0];
    }

    /**
     * Get the request section given the following format:
     *  self::BASE_NAMESPACE\<Domain>\<Section>\<Category>\<RequestName>Request
     *
     * @return string
     */
    public static function getSection(): string
    {
        return self::getMainNamespaceAndRequestParts()[1];
    }

    /**
     * Get the request category given the following format:
     *  self::BASE_NAMESPACE\<Domain>\<Section>\<Category>\<RequestName>Request
     *
     * @return string
     */
    public static function getCategory(): string
    {
        return self::getMainNamespaceAndRequestParts()[2];
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

        return substr(self::getMainNamespaceAndRequestParts()[3], 0, -strlen(self::REQUEST_SUFFIX));
    }

    public static function getClassShortName($class): string
    {
        return (new \ReflectionClass($class))->getShortName();
    }

    /**
     * Get the 'short name' of the request class - the class name without namespaces.
     *
     * @return string
     */
    public static function getRequestClassShortName(): string
    {
        return self::getClassShortName(static::class);
    }

    public static function getFqcn(): string
    {
        return get_called_class();
    }

    public static function getBaseUri(): string
    {
        return static::BASE_URI;
    }

    public static function getClient(): string
    {
        return static::CLIENT;
    }

    public static function getClientClassShortName(): string
    {
        return self::getClassShortName(static::CLIENT);
    }

    public static function getDefaultResponseType(): string
    {
        return static::DEFAULT_RESPONSE_TYPE;
    }

    public static function getNamespace(): string
    {
        $reflector = new \ReflectionClass(get_called_class());

        return $reflector->getNamespaceName();
    }
}