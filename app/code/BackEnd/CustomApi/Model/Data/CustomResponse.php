<?php
namespace BackEnd\CustomApi\Model\Data;

use BackEnd\CustomApi\Api\Data\CustomResponseInterface;

class CustomResponse implements CustomResponseInterface
{
    private $message;
    private $statusCode;

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }
}