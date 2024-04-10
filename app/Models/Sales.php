<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Sales
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'id_order',
        'total_value',
        'payment_methods',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
