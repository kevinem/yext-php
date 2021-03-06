<?php


namespace KevinEm\Yext;


/**
 * Class YextLocationManager
 * @package KevinEm\Yext
 */
class YextLocationManager
{

    /**
     * @var Yext
     */
    protected $yext;

    /**
     * YextLocationManager constructor.
     * @param Yext $yext
     */
    public function __construct(Yext $yext)
    {
        $this->yext = $yext;
    }

    /**
     * @param $customerId
     * @return mixed
     */
    public function getCustomerLocations($customerId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/locations");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $location
     * @return mixed
     */
    public function createCustomerLocation($customerId, $location)
    {
        $url = $this->yext->buildUrl("customers/$customerId/locations");

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($location)
        ];

        $request = $this->yext->createRequest('POST', $url, $options);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $locationId
     * @return mixed
     */
    public function getCustomerLocation($customerId, $locationId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/locations/$locationId");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $locationId
     * @param $update
     * @return mixed
     */
    public function updateCustomerLocation($customerId, $locationId, $update)
    {
        $url = $this->yext->buildUrl("customers/$customerId/locations/$locationId");

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
     * @return mixed
     */
    public function getBusinessCategories()
    {
        $url = $this->yext->buildUrl("categories");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @return mixed
     */
    public function getCustomerFolders($customerId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/folders");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @return mixed
     */
    public function getCustomerContentLists($customerId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/lists");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $list
     * @return mixed
     */
    public function createCustomerContentList($customerId, $list)
    {
        $url = $this->yext->buildUrl("customers/$customerId/lists");

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($list)
        ];

        $request = $this->yext->createRequest('POST', $url, $options);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $listId
     * @return mixed
     */
    public function getCustomerContentList($customerId, $listId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/lists/$listId");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $listId
     * @param $update
     * @return mixed
     */
    public function updateCustomerContentList($customerId, $listId, $update)
    {
        $url = $this->yext->buildUrl("customers/$customerId/lists");

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
     * @param $customerId
     * @param $listId
     * @return mixed
     */
    public function deleteCustomerContentList($customerId, $listId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/lists/$listId");

        $request = $this->yext->createRequest('DELETE', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @return mixed
     */
    public function getCustomerContentListLabels($customerId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/listLabels");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $update
     * @return mixed
     */
    public function updateCustomerContentListLabels($customerId, $update)
    {
        $url = $this->yext->buildUrl("customers/$customerId/listLabels");

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
     * @param $customerId
     * @return mixed
     */
    public function getCustomerCustomFields($customerId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/customFields");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @return mixed
     */
    public function getGoogleAttributes()
    {
        $url = $this->yext->buildUrl("googleKeywords");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }
}