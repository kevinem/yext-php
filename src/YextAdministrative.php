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
    public function getCustomers()
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("customers"));

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customer
     * @return mixed
     */
    public function createCustomer($customer)
    {
        $request = $this->yext->createRequest('POST', $this->buildUrl('customers'), [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($customer)
        ]);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @return mixed
     */
    public function getCustomer($customerId)
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("customers/$customerId"));

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $update
     * @return mixed
     */
    public function updateCustomer($customerId, $update)
    {
        $request = $this->yext->createRequest('PUT', $this->buildUrl("customers/$customerId"), [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($update)
        ]);

        return $this->yext->getResponse($request);
    }

    /**
     * @return mixed
     */
    public function getCustomerAttributes()
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("customerAttributes"));

        return $this->yext->getResponse($request);
    }

    /**
     * @return mixed
     */
    public function getAvailableOffers()
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("offers"));

        return $this->yext->getResponse($request);
    }

    /**
     * @param $offerId
     * @return mixed
     */
    public function getAvailableOffer($offerId)
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("offers/$offerId"));

        return $this->yext->getResponse($request);
    }

    /**
     * @return mixed
     */
    public function getOrders()
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("orders"));

        return $this->yext->getResponse($request);
    }

    /**
     * @param $orderId
     * @return mixed
     */
    public function getOrder($orderId)
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("orders/$orderId"));

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @return mixed
     */
    public function getCustomerSubscriptions($customerId)
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("customers/$customerId/subscriptions"));

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $subscription
     * @return mixed
     */
    public function createCustomerSubscription($customerId, $subscription)
    {
        $request = $this->yext->createRequest('POST', $this->buildUrl("customers/$customerId/subscriptions"), [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($subscription)
        ]);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $subscriptionId
     * @return mixed
     */
    public function getCustomerSubscription($customerId, $subscriptionId)
    {
        $request = $this->yext->createRequest('GET',
            $this->buildUrl("customers/$customerId/subscriptions/$subscriptionId"));

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
        $request = $this->yext->createRequest('PUT',
            $this->buildUrl("customers/$customerId/subscriptions/$subscriptionId"), [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body'    => json_encode($update)
            ]);

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
        $request = $this->yext->createRequest('PUT',
            $this->buildUrl("customers/$customerId/subscriptions/$subscriptionId/locations/$locationId"));

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
        $request = $this->yext->createRequest('DELETE',
            $this->buildUrl("customers/$customerId/subscriptions/$subscriptionId/locations/$locationId"));

        return $this->yext->getResponse($request);
    }

    /**
     * @return mixed
     */
    public function getOptimizationTasks()
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("optimizationTasks"));

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @return mixed
     */
    public function getCustomerOptimizations($customerId)
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("customers/$customerId/optimizations"));

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $optimizationId
     * @return mixed
     */
    public function getCustomerOptimization($customerId, $optimizationId)
    {
        $request = $this->yext->createRequest('GET',
            $this->buildUrl("customers/$customerId/optimizations/$optimizationId"));

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
        $request = $this->yext->createRequest('PUT',
            $this->buildUrl("customers/$customerId/optimizations/$optimizationId"), [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body'    => json_encode($update)
            ]);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $optimizationId
     * @return mixed
     */
    public function getCustomerOptimizationLink($customerId, $optimizationId)
    {
        $request = $this->yext->createRequest('GET',
            $this->buildUrl("customers/$customerId/optimizations/$optimizationId/link"));

        return $this->yext->getResponse($request);
    }
}