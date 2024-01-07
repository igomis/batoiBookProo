<?php

namespace App\Http\Services;

use GuzzleHttp\Client;


class ChatGTPService
{
    /**
     * Register services.
     */

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.openai.api_key'),
            ],
        ]);
    }

    public function post(string $url, array $options = [])
    {
        return $this->client->post($url, $options);
    }
}
