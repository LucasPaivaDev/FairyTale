<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class ProductOrder
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'id_product',
        'id_order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
