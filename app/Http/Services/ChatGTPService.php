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

    public function response($question){
        try {
            $response = $this->client->post('chat/completions', [
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'system', 'content' => 'Ets un fan del Barça.'],
                        ['role' => 'user', 'content' => $question],
                        // La resposta de l'assistant es genera automàticament, no cal proporcionar-la
                    ],
                    'max_tokens' => 250,
                ],
            ]);

            $body = $response->getBody();
            $content = json_decode($body->getContents(), true);
            return $content['choices'];
        } catch (\Exception $e) {
            // Gestiona l'error
            echo "Error: " . $e->getMessage();
        }
    }
}
