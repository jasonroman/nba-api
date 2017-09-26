<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Params\AbstractParam;
use JasonRoman\NbaApi\Response\ResponseType;

/**
 * Base request class that all NBA API requests must extend. This contains all functionality necessary to
 * send a request to the client and retrieve any specific information about a request.
 */
abstract class AbstractNbaApiRequest implements NbaApiRequestInterface
{
    const BASE_NAMESPACE   = __NAMESPACE__;
    const BASE_PARAM_CLASS = AbstractParam::class;

    const REQUEST_SUFFIX = 'Request';

    const DEFAULT_METHOD = 'GET';

    // functions used to retrieve specific parameter values
    const PARAM_DEFAULT_METHOD     = 'getDefaultValue';
    const PARAM_EXAMPLE_METHOD     = 'getExampleValue';
    const CONVERT_TO_STRING_METHOD = 'getStringValue';

    // default implementation uses {<param>} as a placeholder;
    // for example /data/{gameId}/scores will replace {gameId} with the value of $gameId in the request class
    const PLACEHOLDER_START = '{';
    const PLACEHOLDER_END   = '}';

    // default regex looks like the following: /{\K[^}]*(?=})/m
    const REGEX_GET_ENDPOINT_VARS = '/'.
        self::PLACEHOLDER_START.'\K[^'.self::PLACEHOLDER_END.']*(?='.self::PLACEHOLDER_END.')'.
    '/m';

    // default time to wait for responses from the API
    const TIMEOUT         = 10;
    const CONNECT_TIMEOUT = 3;

    const DEFAULT_CONFIG = [
        'timeout'         => self::TIMEOUT,
        'connect_timeout' => self::CONNECT_TIMEOUT,
    ];

    const DEFAULT_HEADERS = [
        // required headers
        'User-Agent'      =>
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) '.
            'AppleWebKit/537.36 (KHTML, like Gecko) '.
            'Chrome/58.0.3029.110 '.
            'Safari/537.36',
        'Origin'          => 'http://stats.nba.com',
        // this will be overridden by the response type of the individual request
        'Accept'          => 'application/json',
        // optional headers that might help prevent timeouts
        'DNT'             => '1',
        'Accept-Language' => 'en-US,en;q=0.8,af;q=0.6',
        'Accept-Encoding' => 'gzip, deflate, sdch',
        'Host'            => 'stats.nba.com',
        'Referer'         => 'http://stats.nba.com',
        'Content-Type'    => 'application/json',
        'Connection'      => 'keep-alive',
        'Cache-Control'   => 'no-cache, no-store, must-revalidate',
    ];

    const DEFAULT_RESPONSE_TYPE = ResponseType::JSON;

    /**
     * {@inheritdoc}
     */
    public function getConfig(): array
    {
        return array_merge(
            self::DEFAULT_CONFIG,
            (defined('static::CONFIG') && is_array(static::CONFIG)) ? static::CONFIG : []
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getHeaders(): array
    {
        return array_merge(
            self::DEFAULT_HEADERS,
            (defined('static::HEADERS') && is_array(static::HEADERS)) ? static::HEADERS : []
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod(): string
    {
        return static::DEFAULT_METHOD;
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

            $endpoint = str_replace('{'.$endpointVar.'}', $this->convertParamValueToString($endpointVar), $endpoint);
        }

        return $endpoint;
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpointVars(): array
    {
        // get all endpoint variables that need replacing
        preg_match_all(static::REGEX_GET_ENDPOINT_VARS, static::ENDPOINT, $endpointVars);

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
                $queryParams[$key] = $this->convertParamValueToString($key);
            }
        }

        return $queryParams;
    }

    /**
     * {@inheritdoc}
     */
    public function getQueryString(): string
    {
        return http_build_query($this->getQueryParams());
    }

    /**
     * {@inheritdoc}
     */
    public static function getDefaultValues(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getExampleValues(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function fromArray(array $array = [], bool $useExampleValues = false): NbaApiRequestInterface
    {
        $calledClass = static::class;

        /** @var AbstractNbaApiRequest $request */
        $request = new $calledClass;

        /**
         * loop through each public property of the class and set the value according to the following priority;
         *
         * Priority:
         *  1. passed in directly to this function (user-defined)
         *  2. retrieved as an example value (only if flag set in function)
         *  3. retrieved as a default value
         */
        foreach ($request->getPublicProperties() as $property) {
            $propertyName = $property->getName();

            // use the property if it was passed in to this method
            if (array_key_exists($propertyName, $array)) {
                $request->$propertyName = $array[$propertyName];

                continue;
            }

            // set from the example value
            if ($useExampleValues && !is_null($exampleValue = static::getExampleValue($propertyName))) {
                $request->$propertyName = $exampleValue;

                continue;
            }

            // set from the default value
            $request->$propertyName = static::getDefaultValue($propertyName);
        }

        return $request;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $toArray = [];

        foreach ($this->getPublicProperties() as $property) {
            $propertyName = $property->getName();

            $toArray[$propertyName] = $this->$propertyName;
        }

        return $toArray;
    }

    /**
     * Wrapper that calls fromArray() with $useExampleValues set to true.
     *
     * @param array $array
     * @return NbaApiRequestInterface
     */
    public static function fromArrayWithExamples(array $array = []): NbaApiRequestInterface
    {
        return static::fromArray($array, true);
    }

    /**
     * Get the default value of a parameter according to the priority.
     *
     * @param string $propertyName
     * @return mixed
     */
    public static function getDefaultValue($propertyName)
    {
        return static::getValue($propertyName, static::PARAM_DEFAULT_METHOD);
    }

    /**
     * Get the example value of a parameter according to the priority.
     *
     * @param string $propertyName
     * @return mixed
     */
    public static function getExampleValue($propertyName)
    {
        return static::getValue($propertyName, static::PARAM_EXAMPLE_METHOD);
    }

    /**
     * Get the value of a parameter according to the priority, stopping when a value at that priority is found.
     * Note that each param class does not have to specifically define this function; it rolls up to the base class.
     *
     * Priority:
     *  1. set in the {$methodName}s() method of the request class
     *  2. set in the $methodName() method of the corresponding Request Type -> Param class
     *  3. set in the $methodName() method of the global Request Type -> Param class
     *
     * @param string $propertyName
     * @param string $methodName
     * @return mixed|null
     */
    public static function getValue($propertyName, $methodName)
    {
        $requestClass       = static::class;
        $abstractParamClass = static::BASE_PARAM_CLASS;

        // use the property if it exists in the corresponding method of the request class
        // this is the plural of the method name; as in getDefaultValue() calls getDefaultValues() here
        $requestValues = $requestClass::{$methodName.'s'}();

        if (array_key_exists($propertyName, $requestValues)) {
            return $requestValues[$propertyName];
        }

        // use the property if it exists in the $methodName() method of the Request Type -> Param class
        // for example, for a Data request, this looks in JasonRoman\NbaApi\Params\Data\<Property>Param
        $requestTypeParamClass = $abstractParamClass::getRequestTypeParamClass(
            $requestClass::getDomain(),
            $propertyName
        );

        // make sure the class exists and is an instance of the base param class
        if (class_exists($requestTypeParamClass) && is_subclass_of($requestTypeParamClass, $abstractParamClass)) {
            $requestTypeValue = $requestTypeParamClass::$methodName();

            // if the default is anything other than null, set the value
            if (!is_null($requestTypeValue)) {
                return $requestTypeValue;
            }
        }

        // use the property if it exists in the $methodName() method of the base Param class
        // for example, this looks in JasonRoman\NbaApi\Params\<Property>Param
        $paramClass = $abstractParamClass::getParamClass($propertyName);

        // make sure the class exists and is an instance of the base param class
        if (class_exists($paramClass) && is_subclass_of($paramClass, $abstractParamClass)) {
            $value = $paramClass::$methodName();

            // if the default is anything other than null, set the value
            if (!is_null($value)) {
                return $value;
            }
        }
    }

    /**
     * The following functions are all helper functions that get various properties/meta information about a request.
     * All requests in this library have a domain, section, and category which can be determined from the namespace.
     * These could probably all be moved out to their own class, or a class that takes in the request. For now many
     * of the functions are static for information that can be retrieved based on the request class itself.
     */

    /**
     * Get the full URL endpoint with all parameters and placeholders.
     *
     * @return string
     */
    public function getFullUrl(): string
    {
        $queryString = $this->getQueryString();

        return sprintf(
            '%s%s%s',
            static::getBaseUri(),
            $this->getEndpoint(),
            ($queryString) ? '/?'.$queryString : ''
        );
    }

    /**
     * Get the base endpoint for display - the base url plus the main endpoint - placeholders show as {placeholder}.
     *
     * @return string
     */
    public function getFullBaseEndpoint(): string
    {
        return static::BASE_URI.static::ENDPOINT;
    }

    /**
     * Get all public properties of the request as reflection properties.
     *
     * @return \ReflectionProperty[]
     */
    public function getPublicProperties(): array
    {
        $reflectionClass = new \ReflectionClass($this);

        return $reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC);
    }

    /**
     * Get all parameter names, which are simply the names of the public properties.
     *
     * @return array
     */
    public function getParamNames(): array
    {
        $names = [];

        foreach ($this->getPublicProperties() as $param) {
            $names[] = $param->getName();
        }

        return $names;
    }

    /**
     * Get the meta information for all parameters.
     *
     * @return array
     */
    public function getParamsInfo(): array
    {
        $paramsInfo = [];

        foreach ($this->getParamNames() as $paramName) {
            $paramsInfo[$paramName] = $this->getParamInfo($paramName);
        }

        return $paramsInfo;
    }

    /**
     * Get the meta information for a single parameter.
     *
     * @param string $paramName
     * @return array
     */
    public function getParamInfo($paramName)
    {
        $propertyUtility = new RequestPropertyUtility($this, $paramName);

        return [
            'is_required'          => $propertyUtility->isRequired(),
            'is_array'             => $propertyUtility->isArray(),
            'is_not_blank'         => $propertyUtility->getNotBlank(),
            'is_not_null'          => $propertyUtility->getNotNull(),
            'description'          => $propertyUtility->getDescription(),
            'type'                 => $propertyUtility->getType(),
            'default_value'        => $propertyUtility->getDefaultValue(),
            'example_value'        => $propertyUtility->getExampleValue(),
            'default_value_string' => $propertyUtility->getDefaultValueAsString(),
            'example_value_string' => $propertyUtility->getExampleValueAsString(),
            'default_value_code'   => $propertyUtility->getDefaultValueAsCode(),
            'example_value_code'   => $propertyUtility->getExampleValueAsCode(),
            'choices'              => $propertyUtility->getChoices(),
            'regex'                => $propertyUtility->getRegex(),
            'range'                => $propertyUtility->getRange(),
            'count'                => $propertyUtility->getCount(),
            'uuid'                 => $propertyUtility->getUuid(),
        ];
    }

    /**
     * Get the namespace and request left after removing the base namespace. All results should be in this format:
     *  static::BASE_NAMESPACE\<Domain>\<Section>\<Category>\<Request>
     *
     * @return string
     * @throws \Exception if the request does not have the base namespace
     */
    public static function getMainNamespaceAndRequest(): string
    {
        if (substr(static::class, 0, strlen(static::BASE_NAMESPACE)) !== static::BASE_NAMESPACE) {
            throw new \Exception("Request must have root namespace of '".static::BASE_NAMESPACE."'");
        }

        return substr(static::class, strlen(static::BASE_NAMESPACE) + 1);
    }

    /**
     * Get the namespace and request parts as an array after removing the base namespace.
     * This must be an array of 4 values: Domain, Section, Category, Request
     *
     * @return array
     * @throws \Exception if the array is not properly sized
     */
    public static function getMainNamespaceAndRequestParts(): array
    {
        $parts = explode('\\', static::getMainNamespaceAndRequest());

        if (count($parts) !== 4) {
            throw new \Exception('Request does not have a proper Domain, Section, and Category');
        }

        return $parts;
    }

    /**
     * Get the request domain given the following format:
     *  static::BASE_NAMESPACE\<Domain>\<Section>\<Category>\<RequestName>Request
     *
     * @return string
     */
    public static function getDomain(): string
    {
        return static::getMainNamespaceAndRequestParts()[0];
    }

    /**
     * Get the request section given the following format:
     *  static::BASE_NAMESPACE\<Domain>\<Section>\<Category>\<RequestName>Request
     *
     * @return string
     */
    public static function getSection(): string
    {
        return static::getMainNamespaceAndRequestParts()[1];
    }

    /**
     * Get the request category given the following format:
     *  static::BASE_NAMESPACE\<Domain>\<Section>\<Category>\<RequestName>Request
     *
     * @return string
     */
    public static function getCategory(): string
    {
        return static::getMainNamespaceAndRequestParts()[2];
    }

    /**
     * Get the request name given the following format:
     *  static::BASE_NAMESPACE\<Domain>\<Section>\<Category>\<RequestName>Request
     *
     * @return string
     * @throws \Exception if the request class does not end with static::REQUEST_SUFFIX
     */
    public static function getRequestName(): string
    {
        if (substr(static::class, -strlen(static::REQUEST_SUFFIX)) !== static::REQUEST_SUFFIX) {
            throw new \Exception("Request class name must end with '".static::REQUEST_SUFFIX."'");
        }

        return substr(static::getMainNamespaceAndRequestParts()[3], 0, -strlen(static::REQUEST_SUFFIX));
    }

    /**
     * Get the 'short name' of the request class - the class name without namespaces.
     *
     * @return string
     */
    public static function getShortName(): string
    {
        return (new \ReflectionClass(static::class))->getShortName();
    }

    /**
     * Get the request's fully-qualified class name.
     *
     * @return string
     */
    public static function getFqcn(): string
    {
        return static::class;
    }

    /**
     * Get the Guzzle base URI.
     *
     * @return string
     */
    public static function getBaseUri(): string
    {
        return static::BASE_URI;
    }

    /**
     * Get the default response type.
     *
     * @return string
     */
    public static function getDefaultResponseType(): string
    {
        return static::DEFAULT_RESPONSE_TYPE;
    }

    /**
     * Get the request namespace.
     *
     * @return string
     */
    public static function getNamespace(): string
    {
        $reflector = new \ReflectionClass(static::class);

        return $reflector->getNamespaceName();
    }

    /**
     * Get the string value of a parameter according to the priority, stopping when a value is converted.
     * Note that each param class does not have to specifically define this function; it rolls up to the base class.
     *
     * Priority:
     *  1. use the getStringValue() method of the corresponding Request Type -> Param class
     *  2. use the getStringValue() method of the corresponding global Param class
     *  3. call the general RequestPropertyUtility::getStringValue() method
     *
     * @param string $propertyName
     * @return string
     */
    protected function convertParamValueToString($propertyName)
    {
        $abstractParamClass = static::BASE_PARAM_CLASS;

        // use the property if it exists in the getDefaultValue() method of the Request Type -> Param class
        // for example, for a Data request, this looks in JasonRoman\NbaApi\Params\Data\<Property>Param
        $requestTypeParamClass = $abstractParamClass::getRequestTypeParamClass(
            $this::getDomain(),
            $propertyName
        );

        // make sure the class exists and is an instance of the base param class
        if (
            class_exists($requestTypeParamClass) &&
            is_subclass_of($requestTypeParamClass, $abstractParamClass) &&
            method_exists($requestTypeParamClass, static::CONVERT_TO_STRING_METHOD)
        ) {
            return $requestTypeParamClass::{static::CONVERT_TO_STRING_METHOD}($this->$propertyName);
        }

        // use the property if it exists in the getDefaultValue() method of the base Param class
        // for example, for a Data request, this looks in JasonRoman\NbaApi\Params\<Property>Param
        $paramClass = $abstractParamClass::getParamClass($propertyName);

        // make sure the class exists and is an instance of the base param class
        if (
            class_exists($paramClass) &&
            is_subclass_of($paramClass, $abstractParamClass) &&
            method_exists($paramClass, static::CONVERT_TO_STRING_METHOD)
        ) {
            return $paramClass::{static::CONVERT_TO_STRING_METHOD}($this->$propertyName);
        }

        // if got here, no specific param class exists, so just cast to string using the request property utility
        return RequestPropertyUtility::getStringValue($this->$propertyName);
    }
}