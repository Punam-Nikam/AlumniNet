<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'receiver_id', 'body', 'is_read'];

    public function sender()
    {
        return $this->belongsTo(Alumni::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(Alumni::class, 'receiver_id');
    }
}