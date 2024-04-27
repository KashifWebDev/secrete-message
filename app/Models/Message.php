<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['text', 'recipient', 'expiry', 'key'];
    protected $encryptable = ['text'];


    public function scopeLatestForRecipient($query, $username)
    {
        return $query->where('recipient', $username)
            ->latest()
            ->first();
    }
}
