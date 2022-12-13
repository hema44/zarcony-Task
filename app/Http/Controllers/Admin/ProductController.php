<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index(){

        return view("Admin.product.index");
    }

    public function datatables()
    {

        $Products = Products::query();

        return DataTables::of($Products)
            ->addColumn('operations',function ($row){
                return '<a  href="'.route("products.edit",$row->id).'" class="btn btn-info btn-sm me-1"><i class="fadeIn animated bx bx-edit-alt"></i></a>'
                    .'<button class="btn btn-danger btn-sm" type="button" onclick="deleteRow(\''.$row->id.'\')">
                                            <i class="fadeIn animated bx bx-trash-alt"></i>
                                        </button>';
            })

            ->rawColumns(['operations' => 'operations'])
            ->toJson();
    }


    public function create(){
        return view("Admin.product.create");
    }
    public function store(Request $request){
        $data = $request->validate([
            "title"=>"required",
            "sku"=>"required|".Rule::unique("products","sku"),
            "Details"=>"required",
            "brand_id"=>"required",
            "price"=>"required",
            "image"=>"required|file",
        ]);
        if ($request->hasFile("image")){
            $data["image"]=uploade($request->file("image"));
        }
        Products::create($data);

        return redirect()->route("products.index");
    }

    public function edit($id){
        $product = Products::find($id);

        return view("Admin.product.edit",compact("product"));
    }
    public function update(Request $request,$id){
        $data = $request->validate([
            "title"=>"required",
            "sku"=>"required",
            "Details"=>"required",
            "brand_id"=>"required",
            "image"=>"required|file",
        ]);
        if ($request->hasFile("image")){
            $data["image"]=uploade($request->file("image"));
        }
        $product = Products::find($id);
        $product->update($data);
        return redirect()->route("products.index");
    }

    public function destroy($id){
        $brand = Products::find($id);
        $brand->delete();
        return redirect()->route("product.index");
    }
}
