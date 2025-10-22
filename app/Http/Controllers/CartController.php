<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{

    public function list()
    {
        $cartItems = Cart::getContent();

        foreach ($cartItems as $item) {
            $product = Product::find($item->id);
            if ($product && $product->discount_percent > 0) {
                $item->attributes->old_price = $product->price / (1 - $product->discount_percent / 100);
            } else {
                $item->attributes->old_price = null;
            }
        }

        return view('cart.list', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'sometimes|required|numeric|min:1'
        ]);

        $product = Product::find($request->product_id);
        $quantity = $request->input('quantity', 1);

        Cart::add([
            'id' => $product->product_id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'attributes' => [
                'image' => $product->main_image,
                'old_price_calc' => $product->old_price
            ]
        ]);

        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'quantity' => 'required|numeric|min:1'
        ]);

        Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ],
        ]);

        return redirect()->route('cart.list')->with('success', 'Cập nhật giỏ hàng thành công!');
    }

    public function remove(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        Cart::remove($request->id);

        return redirect()->route('cart.list')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }

    public function buyNow(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'sometimes|required|numeric|min:1'
        ]);

        $product = Product::find($request->product_id);
        $quantity = $request->input('quantity', 1);

        Cart::clear();

        Cart::add([
            'id' => $product->product_id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'attributes' => [
                'image' => $product->main_image,
                'old_price_calc' => $product->old_price
            ]
        ]);

        return redirect(route('checkout.create'));
    }
}
