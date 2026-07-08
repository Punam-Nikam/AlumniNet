<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'alumni_id', 'title', 'company', 'location',
        'description', 'apply_link', 'type', 'is_referral'
    ];

    // Each job belongs to one alumni
    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}