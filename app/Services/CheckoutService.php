<?php

namespace App\Services;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Orders;

class CheckoutService
{
    public function checkout($data)
    {
        $cart_items = $this->getCartItems();
        $data['total'] = $this->calculateCartTotal($cart_items);
        $order = $this->createOrderRecord($data);
        $this->createOrderDetails($order,$this->prepareCartData($cart_items));
        $this->clearCartData();
        return 'order created successful';
    }


    private function getCartItems()
    {
        $cartService = new CartService();
        return $cartService->getCartItems();
    }

    private function calculateCartTotal($cartItems)
    {
        $total = 0;
        foreach ($cartItems as $cartItem)
        {
            $total += $cartItem->quantity * $cartItem->Products->price;
        }
        return $total;
    }

    private function prepareCartData($cartItems)
    {
        $preparedData =[];
        foreach ($cartItems as $cartItem){
            $preparedData[]=[
                'product_id' => $cartItem->product_id,
                'price' => $cartItem->Products->price,
                'quantity' => $cartItem->quantity
            ];
        }
        return $preparedData;
    }

    private function createOrderRecord($data)
    {
        return Orders::create([
            'user_id' => auth()->id(),
            'total' => $data['total'],
            'address' => $data['address'],
            'order_status_id' => 1
        ]);
    }

    private function createOrderDetails($order,$cart_items)
    {
        return $order->items()->createMany($cart_items);
    }


    private function clearCartData()
    {
        return Cart::where('user_id',auth()->id())->delete();
    }

}
