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

    /**
     * @param $path
     * @return string
     */
    protected function buildUrl($path)
    {
        return $this->yext->getBaseUrl() . '/' . $this->yext->getVersion() . '/' . $path;
    }

    /**
     * @return mixed
     */
    public function getHealthCheck()
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl('healthy'));

        return $this->yext->getResponse($request);
    }
}