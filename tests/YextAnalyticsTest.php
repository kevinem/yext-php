<?php


namespace KevinEm\Yext\Tests;


use KevinEm\Yext\Yext;
use KevinEm\Yext\YextAnalytics;
use Mockery as m;
use Mockery\MockInterface;
use Psr\Http\Message\RequestInterface;

class YextAnalyticsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MockInterface
     */
    protected $yext;

    /**
     * @var YextAnalytics
     */
    protected $yextAnalytics;

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

        $this->yextAnalytics = new YextAnalytics($this->yext);
    }

    public function testStartListingsAndSocialReport()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAnalytics->startListingsAndSocialReport();
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetListingsAndSocialReport()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAnalytics->getListingsAndSocialReport();
        $this->assertEquals($res, 'mock_response');
    }

    public function testStartSearchTermReport()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAnalytics->startSearchTermReport();
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetSearchTermReport()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAnalytics->getSearchTermReport();
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetReportingMaxDate()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAnalytics->getReportingMaxDate();
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetReportingMaxDates()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextAnalytics->getReportMaxDates();
        $this->assertEquals($res, 'mock_response');
    }
}