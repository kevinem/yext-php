<?php


namespace KevinEm\Yext;


/**
 * Class YextSocial
 * @package KevinEm\Yext
 */
class YextSocial
{

    /**
     * @var Yext
     */
    protected $yext;

    /**
     * YextSocial constructor.
     * @param Yext $yext
     */
    public function __construct(Yext $yext)
    {
        $this->yext = $yext;
    }

    /**
     * @param $customerId
     * @param array $query
     * @return mixed
     */
    public function getPosts($customerId, array $query = [])
    {
        $url = $this->yext->buildUrl("customers/$customerId/posts", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $post
     * @return mixed
     */
    public function createPost($customerId, $post)
    {
        $url = $this->yext->buildUrl("customers/$customerId/posts");

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($post)
        ];

        $request = $this->yext->createRequest('POST', $url, $options);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $postId
     * @return mixed
     */
    public function deletePost($customerId, $postId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/posts/$postId");

        $request = $this->yext->createRequest('DELETE', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $postId
     * @param array $query
     * @return mixed
     */
    public function getPostComments($customerId, $postId, array $query = [])
    {
        $url = $this->yext->buildUrl("customers/$customerId/posts/$postId/comments", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $postId
     * @param $comment
     * @return mixed
     */
    public function createPostComment($customerId, $postId, $comment)
    {
        $url = $this->yext->buildUrl("customers/$customerId/posts/$postId");

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body'    => json_encode($comment)
        ];

        $request = $this->yext->createRequest('POST', $url, $options);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $postId
     * @param $commentId
     * @return mixed
     */
    public function deletePostComment($customerId, $postId, $commentId)
    {
        $url = $this->yext->buildUrl("customers/$customerId/posts/$postId/comments/$commentId");

        $request = $this->yext->createRequest('DELETE', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $postId
     * @param array $query
     * @return mixed
     */
    public function getPostDeliveryStatuses($customerId, $postId, array $query = [])
    {
        $url = $this->yext->buildUrl("customers/$customerId/posts/$postId/deliveryStatuses", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param array $query
     * @return mixed
     */
    public function getLinkedAccounts($customerId, array $query = [])
    {
        $url = $this->yext->buildUrl("customers/$customerId/linkedAccounts", $query);

        $request = $this->yext->createRequest('GET', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $postId
     * @param array $query
     * @return mixed
     */
    public function likeFacebookPost($customerId, $postId, array $query = [])
    {
        $url = $this->yext->buildUrl("customers/$customerId/posts/$postId/like", $query);

        $request = $this->yext->createRequest('POST', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $postId
     * @param array $query
     * @return mixed
     */
    public function unlikeFacebookPost($customerId, $postId, array $query = [])
    {
        $url = $this->yext->buildUrl("customers/$customerId/posts/$postId/like", $query);

        $request = $this->yext->createRequest('DELETE', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $postId
     * @param $commentId
     * @param array $query
     * @return mixed
     */
    public function likeFacebookComment($customerId, $postId, $commentId, array $query = [])
    {
        $url = $this->yext->buildUrl("customers/$customerId/posts/$postId/comments/$commentId/like", $query);

        $request = $this->yext->createRequest('POST', $url);

        return $this->yext->getResponse($request);
    }

    /**
     * @param $customerId
     * @param $postId
     * @param $commentId
     * @param array $query
     * @return mixed
     */
    public function unlikeFacebookComment($customerId, $postId, $commentId, array $query = [])
    {
        $url = $this->yext->buildUrl("customers/$customerId/posts/$postId/comments/$commentId/like", $query);

        $request = $this->yext->createRequest('DELETE', $url);

        return $this->yext->getResponse($request);
    }
}