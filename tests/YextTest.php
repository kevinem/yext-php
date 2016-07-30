<?php


namespace KevinEm\Yext\Tests;


use GuzzleHttp\ClientInterface;
use KevinEm\Yext\Exceptions\InvalidYextEnvException;
use KevinEm\Yext\Exceptions\YextException;
use KevinEm\Yext\Yext;
use Mockery as m;
use Mockery\MockInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class YextTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Yext
     */
    protected $yext;

    /**
     * @var MockInterface
     */
    protected $client;

    /**
     * @var MockInterface
     */
    protected $response;

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

        $this->yext = new Yext([
            'api_key' => 'mock_api_key',
            'env'     => 'sandbox'
        ]);

        $this->request = m::mock(RequestInterface::class);
        $this->response = m::mock(ResponseInterface::class);
        $this->client = m::mock(ClientInterface::class);
        $this->yext->setHttpClient($this->client);
    }

    public function testGetSetVersion()
    {
        $this->yext->setVersion('mock_version');
        $this->assertEquals($this->yext->getVersion(), 'mock_version');
    }

    public function testGetHttpClient()
    {
        $this->assertNotNull($this->yext->getHttpClient());
    }

    public function testGetSetApiKey()
    {
        $this->yext->setApiKey('test_api_key');
        $this->assertEquals($this->yext->getApiKey(), 'test_api_key');
    }

    public function testInvalidYextEnvException()
    {
        $this->expectException(InvalidYextEnvException::class);
        $this->yext->setEnv('mock_invalid_env');
    }

    public function testGetSetBaseUrl()
    {
        $this->yext->setBaseUrl('mock_base_url');
        $this->assertEquals($this->yext->getBaseUrl(), 'mock_base_url');
    }

    public function testSandboxEnv()
    {
        $this->assertEquals($this->yext->getBaseUrl(), 'https://api-sandbox.yext.com');
    }

    public function testLiveEnv()
    {
        $this->yext->setEnv('live');
        $this->assertEquals($this->yext->getBaseUrl(), 'https://api.yext.com');
    }

    public function testYextException()
    {
        $this->expectException(YextException::class);

        $error = [
            'errors' => [
                [
                    'message'   => 'mock_message',
                    'errorCode' => 0
                ],
                [
                    'message'   => 'mock_message_2',
                    'errorCode' => 0
                ]
            ]
        ];

        $this->response->shouldReceive('getBody')->andReturn(json_encode($error));
        $this->response->shouldReceive('getHeader')->with('content-type')->andReturn(['mock_header']);

        $this->client->shouldReceive('send')->andReturn($this->response);
        $this->yext->getResponse($this->request);
    }

    public function testCreateRequest()
    {
        $res = $this->yext->createRequest('mock_method', 'mock_url');
        $this->assertNotNull($res);
    }

    public function testParseResponseUrlEncoded()
    {
        $this->response->shouldReceive('getBody')->andReturn('mock_response=mock_data');
        $this->response->shouldReceive('getHeader')->with('content-type')->andReturn(['urlencoded']);

        $this->client->shouldReceive('send')->andReturn($this->response);
        $res = $this->yext->getResponse($this->request);
        $this->assertEquals($res, ['mock_response' => 'mock_data']);
    }

    public function testParseResponseJsonParseError()
    {
        $this->expectException(\UnexpectedValueException::class);

        $this->response->shouldReceive('getBody')->andReturn('mock_json_error');
        $this->response->shouldReceive('getHeader')->with('content-type')->andReturn(['application/json']);

        $this->client->shouldReceive('send')->andReturn($this->response);
        $this->yext->getResponse($this->request);
    }

    public function testParseResponseNonJson()
    {
        $this->response->shouldReceive('getBody')->andReturn('mock_plain_text');
        $this->response->shouldReceive('getHeader')->with('content-type')->andReturn(['text/plain']);

        $this->client->shouldReceive('send')->andReturn($this->response);
        $res = $this->yext->getResponse($this->request);
        $this->assertEquals($res, 'mock_plain_text');
    }

    public function testSendRequestBadResponseException()
    {
        $this->client->shouldReceive('send')->with($this->request)->andReturn();
        $this->yext->sendRequest($this->request);
    }

    public function testAdministrativeNotNull()
    {
        $this->assertNotNull($this->yext->administrative());
    }

    public function testUserNotNull()
    {
        $this->assertNotNull($this->yext->user());
    }

    public function testLocationManagerNotNull()
    {
        $this->assertNotNull($this->yext->locationManager());
    }

    public function testListingsNotNull()
    {
        $this->assertNotNull($this->yext->listings());
    }

    public function testAnalyticsNotNull()
    {
        $this->assertNotNull($this->yext->analytics());
    }

    public function testSocialNotNull()
    {
        $this->assertNotNull($this->yext->social());
    }

    public function testBuildUrl()
    {
        $query = [
            'mock_query'  => 'mock_value',
            'mock_query2' => 'mock_value2'
        ];

        $res = $this->yext->buildUrl('mock_path', $query);
        $this->assertEquals($res,
            'https://api-sandbox.yext.com/v1/mock_path?api_key=mock_api_key&mock_query=mock_value&mock_query2=mock_value2');
    }
}