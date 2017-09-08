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
    const BASE_NAMESPACE = __NAMESPACE__;
    const REQUEST_SUFFIX = 'Request';

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

            $endpoint = str_replace('{'.$endpointVar.'}', $this->convertParamToString($endpointVar), $endpoint);
        }

        return $endpoint;
    }

    /**
     * {@inheritdoc}
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
                $queryParams[$key] = $this->convertParamToString($key);
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
    public function getDefaultValues(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getExampleValues(): array
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

        // get all public properties of the request
        $publicProperties = $request->getPublicProperties();

        /**
         * loop through each public property of the class and set the value according to the following priority;
         *
         * Priority:
         *  1. passed in directly to this function (user-defined)
         *  2. retrieved as an example value (only if flag set in function)
         *  3. retrieved as a default value
         */
        foreach ($publicProperties as $property) {
            $propertyName = $property->getName();

            // use the property if it was passed in to this method
            if (array_key_exists($propertyName, $array)) {
                $request->$propertyName = $array[$propertyName];

                continue;
            }

            // set from the example value
            if ($useExampleValues && !is_null($exampleValue = self::getExampleValue($request, $propertyName))) {
                $request->$propertyName = $exampleValue;

                continue;
            }

            // set from the default value
            $request->$propertyName = self::getDefaultValue($request, $propertyName);
        }

        return $request;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return (array) $this;
    }

    /**
     * Wrapper that calls fromArray() with $useExampleValues set to true.
     *
     * @param array $array
     * @return NbaApiRequestInterface
     */
    public static function fromArrayWithExamples(array $array = []): NbaApiRequestInterface
    {
        return self::fromArray($array, true);
    }

    /**
     * Get the default value of a parameter according to the priority.
     *
     * @param AbstractNbaApiRequest $request
     * @param string $propertyName
     * @return mixed
     */
    public static function getDefaultValue(AbstractNbaApiRequest $request, $propertyName)
    {
        return self::getValue($request, $propertyName, self::PARAM_DEFAULT_METHOD);
    }

    /**
     * Get the example value of a parameter according to the priority.
     *
     * @param AbstractNbaApiRequest $request
     * @param string $propertyName
     * @return mixed
     */
    public static function getExampleValue(AbstractNbaApiRequest $request, $propertyName)
    {
        return self::getValue($request, $propertyName, self::PARAM_EXAMPLE_METHOD);
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
     * @param AbstractNbaApiRequest $request
     * @param string $propertyName
     * @param string $methodName
     * @return mixed|null
     */
    public static function getValue(AbstractNbaApiRequest $request, $propertyName, $methodName)
    {
        // use the property if it exists in the corresponding method of the request class
        // this is the plural of the method name; as in getDefaultValue() calls getDefaultValues() here
        $requestValues = $request->{$methodName.'s'}();

        if (array_key_exists($propertyName, $requestValues)) {
            return $requestValues[$propertyName];
        }

        // use the property if it exists in the $methodName() method of the Request Type -> Param class
        // for example, for a Data request, this looks in JasonRoman\NbaApi\Params\Data\<Property>Param
        $requestTypeFqcn = AbstractParam::getRequestTypeParamClassFqcn($request->getRequestType(), $propertyName);

        // make sure the class exists and is an AbstractParam type
        if (class_exists($requestTypeFqcn) && is_subclass_of($requestTypeFqcn, AbstractParam::class)) {
            $requestTypeValue = $requestTypeFqcn::$methodName();

            // if the default is anything other than null, set the value
            if (!is_null($requestTypeValue)) {
                return $requestTypeValue;
            }
        }

        // use the property if it exists in the $methodName() method of the base Param class
        // for example, this looks in JasonRoman\NbaApi\Params\<Property>Param
        $paramFqcn = AbstractParam::getParamClassFqcn($propertyName);

        // make sure the class exists and is an AbstractParam type
        if (class_exists($paramFqcn) && is_subclass_of($paramFqcn, AbstractParam::class)) {
            $value = $paramFqcn::$methodName();

            // if the default is anything other than null, set the value
            if (!is_null($value)) {
                return $value;
            }
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
    protected function convertParamToString($propertyName)
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
     * These could probably all be moved out to their own class, or a class that takes in the request.
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
            self::getBaseUri(),
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
            'is_required'   => $propertyUtility->isRequired(),
            'is_array'      => $propertyUtility->isArray(),
            'is_not_blank'  => $propertyUtility->getNotBlank(),
            'is_not_null'   => $propertyUtility->getNotNull(),
            'description'   => $propertyUtility->getDescription(),
            'type'          => $propertyUtility->getType(),
            'default_value' => $propertyUtility->getDefaultValue(),
            'example_value' => $propertyUtility->getExampleValue(),
            'choices'       => $propertyUtility->getChoices(),
            'regex'         => $propertyUtility->getRegex(),
            'range'         => $propertyUtility->getRange(),
            'count'         => $propertyUtility->getCount(),
            'uuid'          => $propertyUtility->getUuid(),
        ];
    }

    /**
     * Get the namespace and request left after removing the base namespace. All results should be in this format:
     *  self::BASE_NAMESPACE\<Domain>\<Section>\<Category>\<Request>
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
     * Get the namespace and request parts as an array after removing the base namespace.
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

    /**
     * Get the 'short name' of the request class - the class name without namespaces.
     *
     * @return string
     */
    public static function getRequestClassShortName(): string
    {
        return self::getClassShortName(static::class);
    }

    /**
     * Get a class's reflection short name.
     *
     * @param string$class
     * @return string
     */
    public static function getClassShortName($class): string
    {
        return (new \ReflectionClass($class))->getShortName();
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
}