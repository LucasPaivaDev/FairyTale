<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Orders
{
    use HasFactory, Notifiable;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'value',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
