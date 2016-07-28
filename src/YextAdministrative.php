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

    protected function buildUrl($path)
    {
        return $this->yext->getBaseUrl() . '/' . $this->yext->getVersion() . '/' . $path;
    }

    public function getAllCustomers()
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("customers"));

        return $this->yext->getResponse($request);
    }

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

    public function getCustomer($customerId)
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("customers/$customerId"));

        return $this->yext->getResponse($request);
    }

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

    public function getCustomerAttributes()
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("customerAttributes"));

        return $this->yext->getResponse($request);
    }

    public function getAvailableOffers()
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("offers"));

        return $this->yext->getResponse($request);
    }

    public function getAvailableOffer($offerId)
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("offers/$offerId"));

        return $this->yext->getResponse($request);
    }

    public function getOrders()
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("orders"));

        return $this->yext->getResponse($request);
    }

    public function getOrder($orderId)
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("orders/$orderId"));

        return $this->yext->getResponse($request);
    }

    public function getCustomerSubscriptions($customerId)
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("customers/$customerId/subscriptions"));

        return $this->yext->getResponse($request);
    }

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

    public function getCustomerSubscription($customerId, $subscriptionId)
    {
        $request = $this->yext->createRequest('GET',
            $this->buildUrl("customers/$customerId/subscriptions/$subscriptionId"));

        return $this->yext->getResponse($request);
    }

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

    public function addLocationToCustomerSubscription($customerId, $subscriptionId, $locationId)
    {
        $request = $this->yext->createRequest('PUT',
            $this->buildUrl("customers/$customerId/subscriptions/$subscriptionId/locations/$locationId"));

        return $this->yext->getResponse($request);
    }

    public function removeLocationFromCustomerSubscription($customerId, $subscriptionId, $locationId)
    {
        $request = $this->yext->createRequest('DELETE',
            $this->buildUrl("customers/$customerId/subscriptions/$subscriptionId/locations/$locationId"));

        return $this->yext->getResponse($request);
    }

    public function getOptimizationTasks()
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("optimizationTasks"));

        return $this->yext->getResponse($request);
    }

    public function getCustomerOptimizations($customerId)
    {
        $request = $this->yext->createRequest('GET', $this->buildUrl("customers/$customerId/optimizations"));

        return $this->yext->getResponse($request);
    }

    public function getCustomerOptimization($customerId, $optimizationId)
    {
        $request = $this->yext->createRequest('GET',
            $this->buildUrl("customers/$customerId/optimizations/$optimizationId"));

        return $this->yext->getResponse($request);
    }

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

    public function getCustomerOptimizationLink($customerId, $optimizationId)
    {
        $request = $this->yext->createRequest('GET',
            $this->buildUrl("customers/$customerId/optimizations/$optimizationId/link"));

        return $this->yext->getResponse($request);
    }
}