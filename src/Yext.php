<?php


namespace KevinEm\Yext;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use KevinEm\Yext\Exceptions\InvalidYextEnvException;
use KevinEm\Yext\Exceptions\YextException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use UnexpectedValueException;


/**
 * Class Yext
 * @package KevinEm\Yext
 */
class Yext
{
    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var string
     */
    protected $env;

    /**
     * @var string
     */
    protected $version = 'v1';

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @var YextAdministrative
     */
    protected $administrative;

    /**
     * @var YextUser
     */
    protected $user;

    /**
     * @var YextLocationManager
     */
    protected $locationManager;

    /**
     * @var YextListings
     */
    protected $listings;

    /**
     * Yext constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        if (isset($options['api_key'])) {
            $this->setApiKey($options['api_key']);
        }

        if (isset($options['env'])) {
            $this->setEnv($options['env']);
        }

        $this->setHttpClient(new Client([
            'base_uri' => $this->getBaseUrl()
        ]));

        $this->administrative = new YextAdministrative($this);

        $this->user = new YextUser($this);

        $this->locationManager = new YextLocationManager($this);

        $this->listings = new YextListings($this);
    }

    /**
     * @param string $apiKey
     * @return $this
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $env
     * @return $this
     * @throws InvalidYextEnvException
     */
    public function setEnv($env)
    {
        if (!in_array($env, ['sandbox', 'live'])) {
            throw new InvalidYextEnvException();
        }

        $this->env = $env;

        if ($this->env === 'live') {
            $this->setBaseUrl('https://api.yext.com');
        } else {
            $this->setBaseUrl('https://api-sandbox.yext.com');
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     * @return $this
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return ClientInterface
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param ClientInterface $httpClient
     * @return $this
     */
    public function setHttpClient(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * @param $path
     * @param array $query
     * @return string
     */
    public function buildUrl($path, array $query = [])
    {
        $params = \GuzzleHttp\Psr7\build_query(array_merge(['api_key' => $this->getApiKey()], $query));

        return $this->getBaseUrl() . '/' . $this->getVersion() . '/' . $path . "?$params";
    }

    /**
     * Creates a PSR-7 request instance.
     *
     * @param string $method
     * @param string $url
     * @param  array $options
     * @return Request
     */
    public function createRequest($method, $url, array $options = [])
    {
        $headers = isset($options['headers']) ? $options['headers'] : [];

        $body = isset($options['body']) ? $options['body'] : null;

        return new Request($method, $url, $headers, $body);
    }

    /**
     * Sends a request instance and returns a response instance.
     *
     * @param  RequestInterface $request
     * @return ResponseInterface
     */
    public function sendRequest(RequestInterface $request)
    {
        return $this->getHttpClient()->send($request);
    }

    /**
     * @return YextAdministrative
     */
    public function administrative()
    {
        return $this->administrative;
    }

    /**
     * @return YextUser
     */
    public function user()
    {
        return $this->user;
    }

    /**
     * @return YextLocationManager
     */
    public function locationManager()
    {
        return $this->locationManager;
    }

    /**
     * @return YextListings
     */
    public function listings()
    {
        return $this->listings;
    }

    /**
     * Sends a request and returns the parsed response.
     *
     * @param  RequestInterface $request
     * @return mixed
     */
    public function getResponse(RequestInterface $request)
    {
        $response = $this->sendRequest($request);
        $parsed = $this->parseResponse($response);

        $this->checkResponse($response, $parsed);

        return $parsed;
    }

    /**
     * Attempts to parse a JSON response.
     *
     * @param  string $content JSON content from response body
     * @return array Parsed JSON data
     * @throws UnexpectedValueException if the content could not be parsed
     */
    protected function parseJson($content)
    {
        $content = json_decode($content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new UnexpectedValueException(sprintf(
                "Failed to parse JSON response: %s",
                json_last_error_msg()
            ));
        }

        return $content;
    }

    /**
     * Returns the content type header of a response.
     *
     * @param  ResponseInterface $response
     * @return string Semi-colon separated join of content-type headers.
     */
    protected function getContentType(ResponseInterface $response)
    {
        return join(';', (array)$response->getHeader('content-type'));
    }

    /**
     * Parses the response according to its content-type header.
     *
     * @throws UnexpectedValueException
     * @param  ResponseInterface $response
     * @return array
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $content = (string)$response->getBody();
        $type = $this->getContentType($response);

        if (strpos($type, 'urlencoded') !== false) {
            parse_str($content, $parsed);

            return $parsed;
        }

        // Attempt to parse the string as JSON regardless of content type,
        // since some providers use non-standard content types. Only throw an
        // exception if the JSON could not be parsed when it was expected to.
        try {
            return $this->parseJson($content);
        } catch (UnexpectedValueException $e) {
            if (strpos($type, 'json') !== false) {
                throw $e;
            }

            return $content;
        }
    }

    /**
     * Checks a provider response for errors.
     *
     * @param  ResponseInterface $response
     * @param  array|string $data Parsed response data
     * @throws YextException
     */
    protected function checkResponse(ResponseInterface $response, $data)
    {
        $exception = null;

        if (isset($data['errors'])) {
            foreach ($data['errors'] as $error) {
                $exception = new YextException($error['message'], $error['errorCode'], $exception);
            }
        }

        if ($exception != null) {
            throw $exception;
        }
    }
}