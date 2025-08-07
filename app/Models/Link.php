<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Link extends Model
{


    use HasFactory;

    protected $fillable = [
        'user_id',
        'original_url',
        'shortened_url',
        'custom_alias',
        'password',
        'expires_at',
        'click_count',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'click_count' => 'integer',
    ];

    // Relación con usuario (opcional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


