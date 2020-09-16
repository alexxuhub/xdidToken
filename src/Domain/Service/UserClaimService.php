<?php
declare(strict_types=1);
namespace XDIDSdk\Domain\Service;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use XDIDSdk\Domain\Entity\BaseEntity;
use XDIDSdk\Exception\UserClaimException;

class UserClaimService
{
    /**@var string*/
    private string $baseUrl;

    /**@var string*/
    private string $urlPath;

    /**@var string*/
    private string $bearToken;

    /**@var string*/
    private string $requestMethod;

    public function __construct(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }
    /**
     * @设置请求路径
     * @param BaseEntity $entity
     * @return self;
     */
    public function setRequest(BaseEntity $entity){
        $this->urlPath       = $entity->getUrlPath();
        $this->requestMethod = $entity->getRequestMethod();
        return $this;
    }
    /**
     * 设置请求token
     * @param string $token
     * @return self
     */
    public function setBearToken(string $token){
        $this->bearToken  = $token;
        return $this;
    }

    /**
     * @throws UserClaimException
     * @return array
     */
    public function getResponse(){
        if (empty($this->bearToken)){
            throw new UserClaimException("empty bearToken");
        }
        $client = new Client(['base_uri'=>$this->baseUrl]);
        try {
            $response = $client->request($this->requestMethod, $this->urlPath, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->bearToken,
                    'Accept' => 'application/json',
                ]
            ]);
        } catch (GuzzleException $e) {
            throw new UserClaimException($e->getMessage());
        }
        return json_decode($response->getBody()->getContents(),true);
    }



}