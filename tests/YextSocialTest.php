<?php


namespace KevinEm\Yext\Tests;


use KevinEm\Yext\Yext;
use KevinEm\Yext\YextSocial;
use Mockery as m;
use Mockery\MockInterface;
use Psr\Http\Message\RequestInterface;

class YextSocialTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MockInterface
     */
    protected $yext;

    /**
     * @var YextSocial
     */
    protected $yextSocial;

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

        $this->yextSocial = new YextSocial($this->yext);
    }

    public function testGetPosts()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextSocial->getPosts('mock_customer_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testCreatePost()
    {
        $post = ['mock_field' => 'mock_data'];

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($post)
        ];

        $this->yext->shouldReceive('createRequest')->with('POST', 'mock_url', $options)->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextSocial->createPost('mock_customer_id', $post);
        $this->assertEquals($res, 'mock_response');
    }

    public function testDeletePost()
    {
        $this->yext->shouldReceive('createRequest')->with('DELETE', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextSocial->deletePost('mock_customer_id', 'mock_post_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetPostComments()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextSocial->getPostComments('mock_customer_id', 'mock_post_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testCreatePostComment()
    {
        $comment = ['mock_field' => 'mock_data'];

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($comment)
        ];

        $this->yext->shouldReceive('createRequest')->with('POST', 'mock_url', $options)->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextSocial->createPostComment('mock_customer_id', 'mock_post_id', $comment);
        $this->assertEquals($res, 'mock_response');
    }

    public function testDeletePostComment()
    {
        $this->yext->shouldReceive('createRequest')->with('DELETE', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextSocial->deletePostComment('mock_customer_id', 'mock_post_id', 'mock_comment_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetPostDeliveryStatuses()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextSocial->getPostDeliveryStatuses('mock_customer_id', 'mock_post_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testGetLinkedAccounts()
    {
        $this->yext->shouldReceive('createRequest')->with('GET', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextSocial->getLinkedAccounts('mock_customer_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testLikeFacebookPost()
    {
        $this->yext->shouldReceive('createRequest')->with('POST', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextSocial->likeFacebookPost('mock_customer_id', 'mock_post_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testUnlikeFacebookPost()
    {
        $this->yext->shouldReceive('createRequest')->with('DELETE', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextSocial->unlikeFacebookPost('mock_customer_id', 'mock_post_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testLikeFacebookComment()
    {
        $this->yext->shouldReceive('createRequest')->with('POST', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextSocial->likeFacebookComment('mock_customer_id', 'mock_post_id', 'mock_comment_id');
        $this->assertEquals($res, 'mock_response');
    }

    public function testUnlikeFacebookComment()
    {
        $this->yext->shouldReceive('createRequest')->with('DELETE', 'mock_url')->andReturn($this->request);
        $this->yext->shouldReceive('getResponse')->with($this->request)->andReturn('mock_response');
        $res = $this->yextSocial->unlikeFacebookComment('mock_customer_id', 'mock_post_id', 'mock_comment_id');
        $this->assertEquals($res, 'mock_response');
    }
}