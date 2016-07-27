<?php


namespace KevinEm\Yext;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use KevinEm\Yext\Exceptions\InvalidYextEnvException;


/**
 * Class Yext
 * @package KevinEm\Yext
 */
class Yext
{
    /**
     * @var string
     */
    protected $sandboxUrl = 'https://api-sandbox.yext.com';

    /**
     * @var string
     */
    protected $liveUrl = 'https://api.yext.com';

    /**
     * @var string
     */
    protected $env;

    /**
     * @var
     */
    protected $apiKey;

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * Yext constructor.
     * @param array $options
     * @throws InvalidYextEnvException
     */
    public function __construct(array $options)
    {
        $this->apiKey = $options['api_key'];

        if (!isset($options['env']) || !in_array($options['env'], ['sandbox', 'live'])) {
            throw new InvalidYextEnvException();
        }

        $this->env = $options['env'];

        $this->setHttpClient(new Client([
            'base_uri' => $this->env === 'live' ? $this->liveUrl : $this->sandboxUrl
        ]));
    }

    /**
     * @return string
     */
    public function getSandboxUrl()
    {
        return $this->sandboxUrl;
    }

    /**
     * @return string
     */
    public function getLiveUrl()
    {
        return $this->liveUrl;
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
     */
    public function setHttpClient(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }
}