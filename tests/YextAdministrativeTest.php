<?php


namespace KevinEm\Yext\Tests;


use KevinEm\Yext\Yext;
use KevinEm\Yext\YextAdministrative;
use Mockery as m;
use Mockery\MockInterface;
use Psr\Http\Message\RequestInterface;

class YextAdministrativeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MockInterface
     */
    protected $yext;

    /**
     * @var YextAdministrative
     */
    protected $yextAdministrative;

    /**
     * @var MockInterface
     */
    protected $request;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->request = m::mock(RequestInterface::class);

        $this->yext = m::mock(Yext::class);
        $this->yext->shouldReceive('buildUrl')->andReturn('mock_url');
        $this->yext->shouldReceive('getBaseUrl')->andReturn('mock_base_url');
        $this->yext->shouldReceive('getVersion')->andReturn('mock_version');

        $this->yextAdministrative = new YextAdministrative($this->yext);
    }

    public function testGetAllCustomers()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->getCustomers();
        $this->assertEquals($res, 'mock_response');
    }

    public function testCreateCustomer()
    {
        $customer = ['mock_field' => 'mock_data'];

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($customer)
        ];

        $this->yext->shouldReceive('createRequest')->with('POST', 'mock_url', $options)->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->createCustomer($customer);
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetCustomer()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->getCustomer('mock_customer_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testUpdateCustomer()
    {
        $update = ['mock_field' => 'mock_data'];

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($update)
        ];

        $this->yext->shouldReceive('createRequest')->with('PUT', 'mock_url', $options)->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->updateCustomer('mock_customer_id', $update);
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetCustomerAttributes()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->getCustomerAttributes();
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetAvailableOffers()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->getAvailableOffers();
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetAvailableOffer()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->getAvailableOffer('mock_offer_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetOrders()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->getOrders();
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetOrder()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->getOrder('mock_order_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetCustomerSubscriptions()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->getCustomerSubscriptions('mock_customer_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testCreateCustomerSubscription()
    {
        $subscription = ['mock_field' => 'mock_data'];

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($subscription)
        ];

        $this->yext->shouldReceive('createRequest')->with('POST', 'mock_url', $options)->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->createCustomerSubscription('mock_customer_id', $subscription);
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetCustomerSubscription()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->getCustomerSubscription('mock_customer_id', 'mock_subscription_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testUpdateCustomerSubscription()
    {
        $update = ['mock_field' => 'mock_data'];

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($update)
        ];

        $this->yext->shouldReceive('createRequest')->with('PUT', 'mock_url', $options)->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative
            ->updateCustomerSubscription('mock_customer_id', 'mock_subscription_id', $update);
        $this->assertEquals($res, 'mock_response');
    }

    public function testAddLocationToCustomerSubscription()
    {
        $this->yext->shouldReceive('createRequest')->with('PUT', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative
            ->addLocationToCustomerSubscription('mock_customer_id', 'mock_subscription_id', 'mock_location_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testRemoveLocationFromCustomerSubscription()
    {
        $this->yext->shouldReceive('createRequest')->with('DELETE', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative
            ->removeLocationFromCustomerSubscription('mock_customer_id', 'mock_subscription_id', 'mock_location_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetOptimizationTasks()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->getOptimizationTasks();
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetCustomerOptimizations()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->getCustomerOptimizations('mock_customer_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetCustomerOptimization()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->getCustomerOptimization('mock_customer_id', 'mock_optimization_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testUpdateCustomerOptimization()
    {
        $update = ['mock_field' => 'mock_data'];

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($update)
        ];

        $this->yext->shouldReceive('createRequest')->with('PUT', 'mock_url', $options)->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative
            ->updateCustomerOptimization('mock_customer_id', 'mock_optimization_id', $update);
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetCustomerOptimizationLink()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAdministrative->getCustomerOptimizationLink('mock_customer_id', 'mock_optimization_id');
        $this->assertEquals($res, 'mock_response');
    }
}