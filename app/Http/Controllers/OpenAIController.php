<?php

namespace App\Http\Controllers;

use App\Http\Services\ChatGTPService;

class OpenAIController extends Controller
{

    protected $chatGPTClient;

    public function __construct(ChatGTPService $chatGPTClient)
    {
        $this->chatGPTClient = $chatGPTClient;
    }

    public function index()
    {

        try {
            $response = $this->chatGPTClient->post('chat/completions', [
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'system', 'content' => 'Ets un fan del Barça.'],
                        ['role' => 'user', 'content' => 'Quina va ser la darrera copa de Europa que guanyà el Barça?'],
                        // La resposta de l'assistant es genera automàticament, no cal proporcionar-la
                        ['role' => 'user', 'content' => 'Qui va fer els gols?']
                    ],
                    'max_tokens' => 250,
                ],
            ]);

            $body = $response->getBody();
            $content = json_decode($body->getContents(), true);

            print_r($content);
        } catch (\Exception $e) {
            // Gestiona l'error
            echo "Error: " . $e->getMessage();
        }
    }
}

