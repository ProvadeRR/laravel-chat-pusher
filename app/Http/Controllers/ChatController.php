<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Http\Requests\ChatRequest;
use App\Models\Chat;
use App\Services\ChatService;
use Illuminate\Contracts\View\View;

class ChatController extends Controller
{
    /**
     * @var ChatService $chatService
     */
    private $chatService;


    /**
     * ChatController constructor.
     * @param ChatService $chatService
     */
    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    /**
     * @return View
     */
    public function index(){

        $messages = $this->chatService->getMessages();
        return view('chat.index', ['messages' => $messages]);
    }

    /**
     * @param ChatRequest $chatRequest
     */
    public function sendMessage(ChatRequest $chatRequest)
    {
        $sendMessage = new Chat();
        $sendMessage->user_id = auth()->user()->id;
        $sendMessage->message = $chatRequest->message;
        $sendMessage->save();

        SendMessage::dispatch($chatRequest->message, auth()->user()->name);
    }
}
