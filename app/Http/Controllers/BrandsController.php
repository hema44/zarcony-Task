<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index(){
        $brands = Brands::paginate(21);
        return view("brands",compact("brands"));
    }

}
