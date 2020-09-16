<?php
declare(strict_types=1);

namespace XDIDSdk\Middleware;


use Okta\JwtVerifier\Adaptors\FirebasePhpJwt;
use Okta\JwtVerifier\Discovery\Oidc;
use Okta\JwtVerifier\JwtVerifierBuilder;
use XDIDSdk\Exception\VerifyFailedException;

class XDIDMiddleware
{

    /**@var Oidc*/
    private Oidc $discovery;

    /**@var FirebasePhpJwt*/
    private FirebasePhpJwt $adaptor;

    /**@var string*/
    private string $audience;

    /**@var string*/
    private string $clientId;

    /**@var string*/
    private string $issuer;


    public function setAudience(string $audience){
        $this->audience = $audience;
    }

    /**
     * @param string $clientId
     */
    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @param string $issuer
     */
    public function setIssuer(string $issuer): void
    {
        $this->issuer = $issuer;
    }

    /**
     * 校验Token
     * @param string $token
     * @throws VerifyFailedException
     * @return array
     */
    public function verifyToken(string $token){
        if (empty($this->audience) || empty($this->clientId) || empty($this->issuer)) throw new VerifyFailedException("参数不全");
        $jwtVerifier = (new JwtVerifierBuilder())
            ->setDiscovery(new Oidc())
            ->setAdaptor(new FirebasePhpJwt())
            ->setAudience($this->audience)
            ->setClientId($this->clientId)
            ->setIssuer($this->issuer)->build();
        try {
            $verify = $jwtVerifier->verify($token);
            return $verify->getClaims();
        }catch (\Exception $exception){
            throw new VerifyFailedException("valid exception ".$exception->getMessage());
        }
    }




}