<?php

namespace TechGenies\MM\Api;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class PayTraceApi
{
    private string $accessToken;

    /**
     * PayTraceWS constructor.
     * @throws RequestException
     */
    public function __construct()
    {
        $apiURL =  config('mm.payTrace.apiURL');
        $username =  config('mm.payTrace.username');
        $password =  config('mm.payTrace.password');

        $credentials = [
            'username' => $username,
            'password' => $password,
            'grant_type' => 'password'
        ];

        $response = Http::post($apiURL . '/oauth/token', $credentials);
        $response->throw();
        $this->accessToken = $response->json('access_token');
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
        $apiURL =  config('mm.payTrace.apiURL');

        return [
            'username' => $username,
            'password' => $password,
            'grantType' => 'password',
            'apiURL' => $apiURL
        ];
    }
}
