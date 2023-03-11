<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity',
    ];

    protected $casts = [
        'payload' => 'array',
        'id' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function terminate()
    {
        if ($this->user_id == auth()->id()) {
            $this->delete();
        }
    }

}
