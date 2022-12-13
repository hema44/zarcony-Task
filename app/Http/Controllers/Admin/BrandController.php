<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandSelect2Resource;
use App\Models\Brand;
use App\Models\Brands;
use App\Models\Orders;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
{
    public function index(){


        return view("Admin.Brand.index");
    }
    public function datatables()
    {

        $orders = Brands::query();

        return DataTables::of($orders)
            ->addColumn('operations',function ($row){
                return '<a  href="'.route("brands.edit",$row->id).'" class="btn btn-info btn-sm me-1"><i class="fadeIn animated bx bx-edit-alt"></i></a>'
                    .'<button class="btn btn-danger btn-sm" type="button" onclick="deleteRow(\''.$row->id.'\')">
                                            <i class="fadeIn animated bx bx-trash-alt"></i>
                                        </button>';
            })

            ->rawColumns(['operations' => 'operations'])
            ->toJson();
    }

    public function create(){
        return view("Admin.Brand.create");
    }
    public function store(Request $request){
        $data = $request->validate([
            "name"=>"required",
            "image"=>"file",
        ]);
        if ($request->hasFile("image")){
            $data["image"]=uploade($request->file("image"));
        }
         Brands::create($data);

        return redirect()->route("brands.index");
    }

    public function edit($id){
        $brand = Brands::find($id);

        return view("Admin.Brand.edit",compact("brand"));
    }
    public function update(Request $request,$id){
        $data = $request->validate([
            "name"=>"required",
            "image"=>"file",
        ]);
        if ($request->hasFile("image")){
            $data["image"]=uploade($request->file("image"));
        }

        $brands = Brands::find($id);
        $brands->update($data);
        return redirect()->route("brands.index");
    }

    public function destroy($id){
        $brand = Brands::find($id);
        $brand->delete();
        return redirect()->route("brands.index");
    }

    public function getBrands(Request $request)
    {
        if ($request->get('search')) {
            $brands = Brands::where('name', 'like', '%' . $request->get('search') . '%')
                ->get();

            return response()->json([
                BrandSelect2Resource::collection($brands),
            ]);
        }
        return [];
    }
}
