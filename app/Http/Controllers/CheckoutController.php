<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use Cart;

class CheckoutController extends Controller
{

    public function create()
    {
        if (Cart::isEmpty()) {
            return redirect(route('home'))->with('error', 'Giỏ hàng của bạn trống!');
        }

        $user = Auth::user();
        $cartItems = Cart::getContent();

        return view('checkout.create', compact('user', 'cartItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'payment_method' => 'required|string|in:cod',
        ]);

        if (Cart::isEmpty()) {
            return redirect(route('home'))->with('error', 'Giỏ hàng của bạn trống!');
        }

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => Auth::id(),
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'total_amount' => Cart::getTotal(),
                'payment_method' => $request->payment_method,
                'status' => 'pending',
            ]);

            $cartItems = Cart::getContent();
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->order_id,
                    'product_id' => $item->id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ]);

                // $product = Product::find($item->id);
                // $product->decrement('stock', $item->quantity);
            }

            DB::commit();

            Cart::clear();

            return redirect()->route('checkout.success', $order->order_id);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã có lỗi xảy ra. Vui lòng thử lại.');
        }
    }


    public function success(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('checkout.success', compact('order'));
    }
}
