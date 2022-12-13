<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $with=["brand"];
    protected $fillable =[
        "brand_id",
        "title",
        "sku",
        "Details",
        "price",
        "image",
    ];

    public function brand(){
        return $this->belongsTo(Brands::class);
    }
}
