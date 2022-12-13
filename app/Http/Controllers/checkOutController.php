<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class checkOutController extends Controller
{
    private $CartService;

    public function __construct(){
        $this->CartService = new CartService();
    }
    public function checkout(Request $request){
        $products = $this->CartService->getCartItems();
        $sum = $products->sum("Products.price");
        return view("checkOut",compact("products","sum"));
    }
}
