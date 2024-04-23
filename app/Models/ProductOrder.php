<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductOrder extends Model
{
    use HasFactory, Notifiable;

    public function getProductsAndQuantityByOrderId(int $orderId): ?Model
    {   
        return $this->model
        ->select("*")
        ->where("id_order", "=", $orderId);
    }

    protected $fillable = [
        'id',
        'id_product',
        'id_order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
