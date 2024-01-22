<?php

// app/Http/Controllers/ChatController.php

namespace App\Http\Controllers;

use App\Http\Services\ChatGTPService;
use App\Service\OpenAIService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    public function sendMessage(Request $request)
    {
        $userMessage = $request->input('message');

        // Aquí s'enviaria el missatge a l'API de ChatGPT i es recuperaria la resposta
        // Per aquest exemple, simplement retornarem el missatge de l'usuari

        $response = new ChatGTPService();
        $reply = $response->response($userMessage);
        $message = '';
        foreach ($reply as $r){
            if ($r['message']['role'] == 'assistant') {
                $message .= $r['message']['content'];
            }
        }
        return view('chat.message',compact('message'));
    }
}
