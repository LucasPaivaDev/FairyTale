<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sales extends Model
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
