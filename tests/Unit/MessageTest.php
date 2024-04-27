<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;
use App\Models\Message;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_message()
    {
        $msg = "This is a secrete text message";
        $encryptedMsg = Crypt::encryptString($msg);

        $this->createMessage($encryptedMsg);
        $this->assertDatabaseHas('messages', [
            'text' => $encryptedMsg
        ]);
    }

    /** @test */
    public function user_can_view_message()
    {

        $msg = "This is a secrete text message";
        $encryptedMsg = Crypt::encryptString($msg);
        $message = Message::factory()->create(['text' => $encryptedMsg]);

        $response = $this->get("/messages/{$message->id}");

        $response->assertStatus(200)
            ->assertSee(Crypt::decryptString($encryptedMsg));
    }


    private function createMessage($msg = 'This is a test message'): Message{
        return Message::factory()->create([
            'text' => $msg,
            'recipient' => 'recipient_username',
            'key' => 'test_key',
            'expiry' => now()->addDay()->format('Y-m-d'),
        ]);
    }
}
