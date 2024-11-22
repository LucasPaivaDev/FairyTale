<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;

    protected $table = "product_order";
    protected $fillable = [
        'id',
        'id_product',
        'id_order',
        'quantity',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}

