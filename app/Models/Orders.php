<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $with=['user','items'];

    protected $fillable = [
        "user_id",
        "total",
        "order_status",
        "payment_method",
        "address",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(Orders_details::class);
    }
}
