<?php

namespace App\Http\Controllers;

use App\Services\CheckoutService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private CheckoutService $checkoutService;

    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }
    public function Order(Request $request){
        $validated = $request->validate([
            'address' => 'required',
        ]);

         $this->checkoutService->checkout($validated);

        return redirect()->route("home");
    }
}
