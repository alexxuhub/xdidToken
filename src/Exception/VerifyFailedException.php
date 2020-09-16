<?php
declare(strict_types=1);

namespace XDIDSdk\Exception;


class VerifyFailedException extends \RuntimeException
{
    public function __construct($message = "verify failed", $code = 1001, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}