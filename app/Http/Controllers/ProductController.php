<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $hotProducts = Product::where('discount_percent', '>', 10)
            ->orWhere('sold_count', '>', 200)
            ->orderBy('sold_count', 'desc')
            ->take(6)
            ->get();

        foreach ($hotProducts as $product) {
            $product->old_price = $product->discount_percent > 0
                ? $product->price / (1 - $product->discount_percent / 100)
                : null;
        }

        return view('welcome', compact('hotProducts'));
    }

    public function show($id)
    {
        $product = Product::with(['category'])->findOrFail($id);

        $product->old_price = $product->discount_percent > 0
            ? $product->price / (1 - $product->discount_percent / 100)
            : null;

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('product_id', '!=', $id)
            ->take(4)
            ->get();

        foreach ($relatedProducts as $related) {
            $related->old_price = $related->discount_percent > 0
                ? $related->price / (1 - $related->discount_percent / 100)
                : null;
        }

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'image_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Product added!');
    }
}
