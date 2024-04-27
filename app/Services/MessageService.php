<?php
namespace App\Services;

use Illuminate\Support\Facades\Crypt;

class MessageService
{
    public function encryptText(string $text): string
    {
        return Crypt::encryptString($text);
    }

    public function decryptText(string $encryptedText): string
    {
        return Crypt::decryptString($encryptedText);
    }
}
?>
