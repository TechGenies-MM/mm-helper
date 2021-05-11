<?php

namespace TechGenies\MM\Api;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use TechGenies\MM\Exceptions\PayTraceException;

class PayTraceApi
{
    private string $accessToken;
    private string $apiURL;

    /**
     * PayTraceWS constructor.
     * @throws PayTraceException
     */
    public function __construct()
    {
        try {
            $this->apiURL =  config('mm.payTrace.apiURL');
            $username =  config('mm.payTrace.username');
            $password =  config('mm.payTrace.password');

            $data = [
                'username' => $username,
                'password' => $password,
                'grant_type' => 'password'
            ];

            $response = Http::post($this->apiURL . '/oauth/token', $data);
            $response->throw();
            $this->accessToken = $response->json('access_token');
        } catch (RequestException $e) {
            throw new PayTraceException($e->response->body(), $e->getCode());
        }
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

    /**
     * @param $data
     * @return mixed
     * @throws PayTraceException
     */
    public function createCustomer($data): mixed
    {
        try {
            $response = Http::withToken($this->accessToken)->asForm()->post($this->apiURL . '/v1/customer/create', $data);
            $response->throw();
            return $response->json();
        } catch (RequestException $e) {
            throw new PayTraceException($e->response->body(), $e->getCode());
        }
    }

    /**
     * @param $data
     * @return mixed
     * @throws PayTraceException
     */
    public function ACHVaultSale($data): mixed
    {
        try {
            $response = Http::withToken($this->accessToken)->asForm()->post($this->apiURL . '/v1/checks/sale/by_customer', $data);
            $response->throw();
            return $response->json();
        } catch (RequestException $e) {
            throw new PayTraceException($e->response->body(), $e->getCode());
        }
    }
}
