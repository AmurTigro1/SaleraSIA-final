<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class BitlyService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api-ssl.bitly.com/v4/',
        ]);
    }

    public function shortenUrl($accessToken, $url)
    {
        $response = $this->client->post('shorten', [
            'form_params' => [
                'access_token' => $accessToken,
                'long_url' => $url,
                'domain' => 'bit.ly',
            ],
        ]);

        $body = json_decode((string) $response->getBody(), true);

        return $body['link'];
    }
}