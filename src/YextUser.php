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
     * @return mixed
     */
    public function getHealthCheck()
    {
        $url = $this->yext->buildUrl('healthy');

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }
}