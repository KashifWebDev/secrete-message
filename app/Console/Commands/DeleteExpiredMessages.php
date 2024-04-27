<?php

namespace App\Console\Commands;

use App\Models\Message;
use Illuminate\Console\Command;

class DeleteExpiredMessages extends Command
{
    protected $signature = 'messages:delete-expired';

    protected $description = 'Delete expired messages';

    public function handle()
    {
        Message::whereDate('expiry', '<=', now())->delete();

        $this->info('Expired messages deleted successfully.');
    }
}
