<?php

namespace TechGenies\MM\Api;

class PayTraceApi
{
    private string $accessToken;

    /**
     * PayTraceWS constructor.
     */
    public function __construct()
    {
        $this->accessToken = 'abc123';
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @return array
     */
    public function getCredentials(): array
    {
        $username =  config('mm.payTrace.username');
        $password =  config('mm.payTrace.password');

        return ['username' => $username, 'password' => $password];
    }
}
