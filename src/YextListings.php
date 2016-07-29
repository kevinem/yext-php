<?php


namespace KevinEm\Yext;


/**
 * Class YextListings
 * @package KevinEm\Yext
 */
class YextListings
{

    /**
     * @var Yext
     */
    protected $yext;

    /**
     * YextListings constructor.
     * @param Yext $yext
     */
    public function __construct(Yext $yext)
    {
        $this->yext = $yext;
    }

    /**
     * @param array $query
     * @return mixed
     */
    public function getPowerListingsStatus(array $query = [])
    {
        $url = $this->yext->buildUrl("powerlistings/status", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }
}