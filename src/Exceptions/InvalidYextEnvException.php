<?php


namespace KevinEm\Yext\Exceptions;


use Exception;

class InvalidYextEnvException extends \Exception
{
    public function __construct($message = 'Invalid Yext Exception', $code = 400, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}