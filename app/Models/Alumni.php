<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumni extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'branch', 'batch',
        'company', 'role', 'phone', 'bio', 'profile_photo', 'status', 'is_admin'
    ];

    protected $hidden = ['password'];

    // One alumni can post many jobs
    public function jobPosts()
    {
        return $this->hasMany(JobPost::class);
    }

    // Connections sent by this alumni
    public function sentConnections()
    {
        return $this->hasMany(Connection::class, 'sender_id');
    }

    // Connections received by this alumni
    public function receivedConnections()
    {
        return $this->hasMany(Connection::class, 'receiver_id');
    }

    // Messages sent
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }
}