<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'value',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
