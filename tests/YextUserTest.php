<?php


namespace KevinEm\Yext\Tests;


use KevinEm\Yext\Yext;
use KevinEm\Yext\YextUser;
use Mockery as m;
use Mockery\MockInterface;
use Psr\Http\Message\RequestInterface;

class YextUserTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MockInterface
     */
    protected $yext;

    /**
     * @var YextUser
     */
    protected $yextUser;

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
        $this->yext->shouldReceive('getBaseUrl')->andReturn('mock_base_url');
        $this->yext->shouldReceive('getVersion')->andReturn('mock_version');

        $this->yextUser = new YextUser($this->yext);
    }

    public function testGetHealthCheck()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_base_url/mock_version/healthy')->andReturn($this->request);
        $this->yext->shouldReceive('sendRequest')->with($this->request)->andReturn('mock_response');
        $res = $this->yextUser->getHealthCheck();
        $this->assertEquals($res, 'mock_response');
    }
}