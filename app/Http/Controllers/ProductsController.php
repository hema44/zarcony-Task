<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $Products = Products::paginate(21);
        return view("Products",compact("Products"));
    }
    public function productDetails($id){
        $Product = Products::find($id);
        $RecommendedProducts = Products::inRandomOrder()->limit(3)->get();
        return view("productDetails",compact("Product","RecommendedProducts"));
    }
}
