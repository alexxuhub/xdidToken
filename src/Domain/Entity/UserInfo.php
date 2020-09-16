<?php
declare(strict_types=1);

namespace XDIDSdk\Domain\Entity;


class UserInfo extends BaseEntity
{
    /**
     * @var string
     */
    protected string $urlPath = 'userinfo';
    /**
     * @var string
     */
    protected string $requestMethod = 'GET';
    public function getUrlPath()
    {
        return $this->urlPath;
    }
    public function getRequestMethod()
    {
        return $this->requestMethod;
    }



}