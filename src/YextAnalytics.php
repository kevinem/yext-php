<?php


namespace KevinEm\Yext;


/**
 * Class YextAnalytics
 * @package KevinEm\Yext
 */
class YextAnalytics
{

    /**
     * @var Yext
     */
    protected $yext;

    /**
     * YextAdministrative constructor.
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
    public function startListingsAndSocialReport(array $query = [])
    {
        $url = $this->yext->buildUrl("powerlistings/startReport", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param array $query
     * @return mixed
     */
    public function getListingsAndSocialReport(array $query = [])
    {
        $url = $this->yext->buildUrl("powerlistings/getReport", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param array $query
     * @return mixed
     */
    public function startSearchTermReport(array $query = [])
    {
        $url = $this->yext->buildUrl("powerlistings/reporting/searchtermsstart", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param array $query
     * @return mixed
     */
    public function getSearchTermReport(array $query = [])
    {
        $url = $this->yext->buildUrl("powerlistings/reporting/searchterms", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param array $query
     * @return mixed
     */
    public function getReportingMaxDate(array $query = [])
    {
        $url = $this->yext->buildUrl("powerlistings/reportingMaxDate", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param array $query
     * @return mixed
     */
    public function getReportMaxDates(array $query = [])
    {
        $url = $this->yext->buildUrl("powerlistings/reportingMaxDates", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }
}