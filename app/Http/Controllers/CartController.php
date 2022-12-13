<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(){
        $this->CartService = new CartService();
    }

    public function store($id){
        $this->CartService->addToCart($id);
        return redirect()->route('cart');
    }

    public function show(){
        $products = $this->CartService->getCartItems();
        return view('cart',compact('products'));
    }

    public function delete($id){
        $this->CartService->deleteCartItem($id);
        $products = $this->CartService->getCartItems();

        return view('cart',compact('products'));
    }
}
