<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_details extends Model
{
    use HasFactory;

    protected $fillable = [
        "order_id",
        "product_id",
        "quantity",
        "price",
    ];

    public function Products(){
        return $this->belongsTo(Products::class,"product_id");
    }

    public function Orders(){
        return $this->belongsTo(Orders::class);
    }
}
