<?php

namespace App\Http\Controllers;

use App\Http\Requests\DecryptMessageRequest;
use App\Models\Message;
use App\Services\MessageService;
use Illuminate\Http\Request;

class DecryptionController extends Controller
{
    public function __construct(protected MessageService $messageService){
    }

    public function showForm()
    {
        return view('messages.decrypt');
    }

    // Method to handle the decryption process
    public function decrypt(DecryptMessageRequest $request)
    {
        $username = $request->input('username');
        $decryptionKey = $request->input('decryption_key');

        $message = Message::whereRecipient($username);

        if ($message->doesntExist())
            return back()->with('status', 'There\'s no message for you right now!');

        $latestMessage = $message->latestForRecipient($username);

        if($latestMessage->key !== $decryptionKey)
            return back()->with('status', 'You\'ve entered a wrong decryption Key');

        $decryptedMessage = $this->messageService->decryptText($latestMessage->text);

        if($latestMessage->expiry == null)
            $latestMessage->delete();

        return view('messages.show', compact("decryptedMessage"));
    }
}
