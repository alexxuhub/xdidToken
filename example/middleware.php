<?php
declare(strict_types=1);
require "../vendor/autoload.php";

$XDIDToken = new XDIDSdk\Middleware\XDIDMiddleware();
try {
    $XDIDToken->setAudience('https://passport.xindong.com/new');
    $XDIDToken->setIssuer('https://passport.xindong.com/new');
    $XDIDToken->setClientId('test');
    $res =  $XDIDToken->verifyToken('eyJhbGciOiJSUzI1NiIsImtpZCI6IlJrM1M4Rlk1UjJyQmRwaThUbkZpNzhxQ3F4Z3hQbG9ST3lHRTVwcmlhVTQ9In0.eyJzdWIiOiJidDhhcW9vMTVpNmI1MmV1dTY4ZyIsImF1ZCI6Imh0dHBzOi8vcGFzc3BvcnQueGluZG9uZy5jb20vbmV3IiwiaXNzIjoiaHR0cHM6Ly9wYXNzcG9ydC54aW5kb25nLmNvbS9uZXciLCJpc2EiOjE2MDAxNzMyNDYsImV4cCI6MTYwMDE3Njg0NiwiY2lkIjoidGVzdCIsImp0aSI6IjFjYWYwMzljYTRjZjY1ODc4MjMxNTVmNTMyZDBiNjIwZWU1Yjk5MjU2NTEzNTc0ZjdhMjcyNmJkMzZlM2FiNDMiLCJ1c2VybmFtZSI6ImFsZXhQYW5nQHhkLmNvbSIsInNjb3BlIjpbImVtYWlsIiwib3BlbmlkIiwicGhvbmUiLCJwcm9maWxlIl19.cgVO6S8p6IccW_it1UzyE_JVXFkARBEVqal6bZx9-DGHQouqyOHSSjzqNu2IAfy1edN3DNQC0gMZNQSfBAn_ngfA0u8AZF29-JJOqCXnBMV_98rb2nh33ExoG2z4bylSCF99zN-2395GI8KLfQGWhzpmilgmP7XWceZ6LBRmux75XUuIsoZ8aZvn7zKaoVmMQP3Y6auGHnyeNcxmG_7urvrwtNA7XsbiBJNXYHrSraSpsGDXjTiM8bzBpM6bRw7Yaycj6WRWVaEJC12rOQ9zVvurBIbMBDyThqzg6BSHTp3oV9vxguTjskQT6pEbuP2f1YFWOS3CnEyh-cJjI6V_cw');
    var_dump($res);
}catch (\Exception $exception){
    var_dump(['exception'=>$exception->getMessage(),'file'=>$exception->getFile(),'line'=>$exception->getLine()]);
}
