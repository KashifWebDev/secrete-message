<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use App\Services\MessageService;

class MessageController extends Controller
{
    public function __construct(protected MessageService $messageService){
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(StoreMessageRequest $request)
    {
        $encryptedText = $this->messageService->encryptText($request->text);

        $message = Message::create([
            'text' => $encryptedText,
            'recipient' => $request->recipient,
            'expiry' => ($request->expiry_option == 'delete_on_date') ? $request->expiry : null,
            'key' => $request->key,
        ]);

        return back()->with('status', 'Message was encrypted successfully!');
    }
    public function show($id)
    {
        $message = Message::find($id);

        // Check if the message exists
        if (!$message)
            abort(404, 'Message not found');

        $decryptedMessage = $this->messageService->decryptText($message->text);

        return view('messages.show', compact("decryptedMessage"));
    }


}
