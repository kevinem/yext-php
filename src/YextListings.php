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
    public function getListingsStatus(array $query = [])
    {
        $url = $this->yext->buildUrl("powerlistings/status", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param array $query
     * @return mixed
     */
    public function getSuggestions(array $query = [])
    {
        $url = $this->yext->buildUrl("powerlistings/publisherSuggestions", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $suggestionId
     * @return mixed
     */
    public function getSuggestion($suggestionId)
    {
        $url = $this->yext->buildUrl("powerlistings/publisherSuggestions/$suggestionId");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $listingId
     * @param array $query
     * @return mixed
     */
    public function getSuggestionsForCustomer($listingId, array $query = [])
    {
        $url = $this->yext->buildUrl("powerlistings/$listingId/publisherSuggestions", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $listingId
     * @param $suggestionId
     * @return mixed
     */
    public function getSuggestionForCustomer($listingId, $suggestionId)
    {
        $url = $this->yext->buildUrl("powerlistings/$listingId/publisherSuggestions/$suggestionId");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $suggestionId
     * @param $update
     * @return mixed
     */
    public function updateSuggestion($suggestionId, $update)
    {
        $url = $this->yext->buildUrl("powerlistings/publisherSuggestions/$suggestionId");

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($update)
        ];

        $request = $this->yext->createRequest('PUT', $url, $options);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $listingId
     * @param $suggestionId
     * @param $update
     * @return mixed
     */
    public function updateSuggestionForCustomer($listingId, $suggestionId, $update)
    {
        $url = $this->yext->buildUrl("powerlistings/$listingId/publisherSuggestions/$suggestionId");

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($update)
        ];

        $request = $this->yext->createRequest('PUT', $url, $options);

        return $this->yext->getResponse($request);
    }
}