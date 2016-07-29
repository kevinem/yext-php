<?php


namespace KevinEm\Yext\Tests;


use KevinEm\Yext\Yext;
use KevinEm\Yext\YextListings;
use Mockery as m;
use Mockery\MockInterface;
use Psr\Http\Message\RequestInterface;

class YextListingsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MockInterface
     */
    protected $yext;

    /**
     * @var YextListings
     */
    protected $yextListings;

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

        $this->yextListings = new YextListings($this->yext);
    }

    public function testGetListingsStatus()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextListings->getListingsStatus();
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetSuggestions()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextListings->getSuggestions();
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetSuggestion()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextListings->getSuggestion('mock_suggestion_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetSuggestionsForCustomer()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextListings->getSuggestionsForCustomer('mock_listing_id', []);
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetSuggestionForCustomer()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextListings->getSuggestionForCustomer('mock_listing_id', 'mock_suggestion_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testUpdateSuggestion()
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
        $res = $this->yextListings->updateSuggestion('mock_suggestion_id', $update);
        $this->assertEquals($res, 'mock_response');
    }

    public function testUpdateSuggestionForCustomer()
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
        $res = $this->yextListings->updateSuggestionForCustomer('mock_listing_id', 'mock_suggestion_id', $update);
        $this->assertEquals($res, 'mock_response');
    }
}