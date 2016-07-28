<?php


namespace KevinEm\Yext;


/**
 * Class YextUser
 * @package KevinEm\Yext
 */
class YextUser
{

    /**
     * @var Yext
     */
    protected $yext;

    /**
     * YextUser constructor.
     * @param Yext $yext
     */
    public function __construct(Yext $yext)
    {
        $this->yext = $yext;
    }

    protected function buildUrl($path)
    {
        return $this->yext->getBaseUrl() . '/' . $this->yext->getVersion() . '/' . $path;
    }

    public function getHealthCheck()
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl('healthy'));

        return $this->yext->sendRequest($request);
    }
}