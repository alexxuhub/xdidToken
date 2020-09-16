<?php
declare(strict_types=1);

namespace XDIDSdk\Exception;


class UserClaimException extends \RuntimeException
{
    public function __construct($message = "Claim failed", $code = 1002, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}