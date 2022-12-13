<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orders;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index(){
        return view("Admin.order.index");
    }

    public function datatables()
    {

        $orders = Orders::query();

        return DataTables::of($orders)
            ->addColumn('operations',function ($row){
                return '<a href="'.route("orders.show",$row->id).'" class="btn btn-info btn-sm">
                                        <i class="fadeIn animated bx bx-show-alt"></i>
                                    </a>';
            })

            ->rawColumns(['operations' => 'operations'])
            ->toJson();
    }


    public function show($id)
    {
        $order = Orders::with('items')->find($id);
        return view('Admin.order.show',compact('order'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate(['order_status' => 'required']);
        $order = Orders::find($id);
        $order->update($validated);

        return redirect()->route('orders.index');
    }
}
