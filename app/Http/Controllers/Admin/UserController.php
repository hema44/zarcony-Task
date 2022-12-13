<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(){
        return view("Admin.users.index");
    }
    public function datatables()
    {
        $users = User::query()->where('is_admin',0);

        return DataTables::of($users)
            ->rawColumns(['operations' => 'operations'])
            ->toJson();
    }
}
