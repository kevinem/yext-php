<?php


namespace KevinEm\Tests;


use KevinEm\Yext\Exceptions\InvalidYextEnvException;
use KevinEm\Yext\Yext;

class YextTest extends \PHPUnit_Framework_TestCase
{
    protected $yext;

    protected function setUp()
    {
        parent::setUp();

        $this->yext = new Yext([
            'api_key' => 'mock_api_key',
            'env'     => 'sandbox'
        ]);
    }

    public function testInvalidYextEnvException()
    {
        $this->expectException(InvalidYextEnvException::class);

        $yext = new Yext([
            'api_key' => 'mock_api_key'
        ]);
    }

    public function testSandboxEnv()
    {
        $yext = new Yext([
            'api_key' => 'mock_api_key',
            'env'     => 'sandbox'
        ]);

        $this->assertEquals($yext->getSandboxUrl(), $yext->getHttpClient()->getConfig('base_uri'));
    }

    public function testLiveEnv()
    {
        $yext = new Yext([
            'api_key' => 'mock_api_key',
            'env'     => 'live'
        ]);

        $this->assertEquals($yext->getLiveUrl(), $yext->getHttpClient()->getConfig('base_uri'));
    }
}