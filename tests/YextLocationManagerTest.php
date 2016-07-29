<?php


namespace KevinEm\Yext\Tests;


use KevinEm\Yext\Yext;
use KevinEm\Yext\YextLocationManager;
use Mockery as m;
use Mockery\MockInterface;
use Psr\Http\Message\RequestInterface;

class YextLocationManagerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MockInterface
     */
    protected $yext;

    /**
     * @var YextLocationManager
     */
    protected $yextLocationManager;

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

        $this->yextLocationManager = new YextLocationManager($this->yext);
    }

    public function testGetCustomerLocations()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextLocationManager->getCustomerLocations('mock_customer_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testCreateCustomerLocation()
    {
        $location = ['mock_field' => 'mock_data'];

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($location)
        ];

        $this->yext->shouldReceive('createRequest')->with('POST', 'mock_url', $options)->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextLocationManager->createCustomerLocation('mock_customer_id', $location);
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetCustomerLocation()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextLocationManager->getCustomerLocation('mock_customer_id', 'mock_location_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testUpdateCustomerLocation()
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
        $res = $this->yextLocationManager->updateCustomerLocation('mock_customer_id', 'mock_location_id', $update);
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetBusinessCategories()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextLocationManager->getBusinessCategories();
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetCustomerFolders()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextLocationManager->getCustomerFolders('mock_customer_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetCustomerContentLists()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextLocationManager->getCustomerContentLists('mock_customer_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testCreateCustomerContentList()
    {
        $list = ['mock_field' => 'mock_data'];

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($list)
        ];

        $this->yext->shouldReceive('createRequest')->with('POST', 'mock_url', $options)->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextLocationManager->createCustomerContentList('mock_customer_id', $list);
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetCustomerContentList()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextLocationManager->getCustomerContentList('mock_customer_id', 'mock_list_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testUpdateCustomerContentList()
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
        $res = $this->yextLocationManager->updateCustomerContentList('mock_customer_id', 'mock_list_id', $update);
        $this->assertEquals($res, 'mock_response');
    }

    public function testDeleteCustomerContentList()
    {
        $this->yext->shouldReceive('createRequest')->with('DELETE', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextLocationManager->deleteCustomerContentList('mock_customer_id', 'mock_list_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetCustomerContentListLabels()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextLocationManager->getCustomerContentListLabels('mock_customer_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testUpdateCustomerContentListLabels()
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
        $res = $this->yextLocationManager->updateCustomerContentListLabels('mock_customer_id', $update);
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetCustomerCustomFields()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextLocationManager->getCustomerCustomFields('mock_customer_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetGoogleAttributes()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextLocationManager->getGoogleAttributes();
        $this->assertEquals($res, 'mock_response');
    }
}