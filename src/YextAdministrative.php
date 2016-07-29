<?php


namespace KevinEm\Yext;


class YextAdministrative
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
    public function getCustomers(array $query = [])
    {
        $url = $this->yext->buildUrl("customers", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customer
     * @return mixed
     */
    public function createCustomer($customer)
    {
        $url = $this->yext->buildUrl("customers");

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($customer)
        ];

        $request = $this->yext->createRequest('POST', $url, $options);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @return mixed
     */
    public function getCustomer($customerId)
    {
        $url = $this->yext->buildUrl("customers/$customerId");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $update
     * @return mixed
     */
    public function updateCustomer($customerId, $update)
    {
        $url = $this->yext->buildUrl("customers/$customerId");

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
    public function getCustomerAttributes()
    {
        $url = $this->yext->buildUrl("customerAttributes");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @return mixed
     */
    public function getAvailableOffers()
    {
        $url = $this->yext->buildUrl("offers");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $offerId
     * @return mixed
     */
    public function getAvailableOffer($offerId)
    {
        $url = $this->yext->buildUrl("offers/$offerId");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param array $query
     * @return mixed
     */
    public function getOrders(array $query = [])
    {
        $url = $this->yext->buildUrl("orders", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $orderId
     * @return mixed
     */
    public function getOrder($orderId)
    {
        $url = $this->yext->buildUrl("orders/$orderId");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @return mixed
     */
    public function getCustomerSubscriptions($customerId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/subscriptions");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $subscription
     * @return mixed
     */
    public function createCustomerSubscription($customerId, $subscription)
    {
        $url = $this->yext->buildUrl("customers/$customerId/subscriptions");

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($subscription)
        ];

        $request = $this->yext->createRequest('POST', $url, $options);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $subscriptionId
     * @return mixed
     */
    public function getCustomerSubscription($customerId, $subscriptionId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/subscriptions/$subscriptionId");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $subscriptionId
     * @param $update
     * @return mixed
     */
    public function updateCustomerSubscription($customerId, $subscriptionId, $update)
    {
        $url = $this->yext->buildUrl("customers/$customerId/subscriptions/$subscriptionId");

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
     * @param $subscriptionId
     * @param $locationId
     * @return mixed
     */
    public function addLocationToCustomerSubscription($customerId, $subscriptionId, $locationId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/subscriptions/$subscriptionId/locations/$locationId");

        $request = $this->yext->createRequest('PUT', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $subscriptionId
     * @param $locationId
     * @return mixed
     */
    public function removeLocationFromCustomerSubscription($customerId, $subscriptionId, $locationId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/subscriptions/$subscriptionId/locations/$locationId");

        $request = $this->yext->createRequest('DELETE', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @return mixed
     */
    public function getOptimizationTasks()
    {
        $url = $this->yext->buildUrl("optimizationTasks");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @return mixed
     */
    public function getCustomerOptimizations($customerId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/optimizations");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $optimizationId
     * @return mixed
     */
    public function getCustomerOptimization($customerId, $optimizationId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/optimizations/$optimizationId");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $optimizationId
     * @param $update
     * @return mixed
     */
    public function updateCustomerOptimization($customerId, $optimizationId, $update)
    {
        $url = $this->yext->buildUrl("customers/$customerId/optimizations/$optimizationId");

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
     * @param $optimizationId
     * @return mixed
     */
    public function getCustomerOptimizationLink($customerId, $optimizationId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/optimizations/$optimizationId/link");

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }
}