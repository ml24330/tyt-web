<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id', 'owner_name', 'title', 'body', 'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
