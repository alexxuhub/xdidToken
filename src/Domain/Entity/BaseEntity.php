<?php
declare(strict_types=1);

namespace XDIDSdk\Domain\Entity;


abstract class BaseEntity
{
    /**
     * @var string
     */
    protected string $urlPath;

    /**@var string*/
    protected string $requestMethod;
    /**
     * @获取路径
     */
    public function getUrlPath(){
        return $this->urlPath;
    }

    public function getRequestMethod(){
        return $this->requestMethod;
    }

}