<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Products
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'name',
        'image',
        'type',
        'value',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
