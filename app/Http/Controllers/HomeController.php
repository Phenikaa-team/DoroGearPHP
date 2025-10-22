<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hotProducts = Product::where('discount_percent', '>', 10)
            ->orWhere('sold_count', '>', 200)
            ->orderBy('sold_count', 'desc')
            ->take(6)
            ->get();

        $cpuCategory = Category::where('name', 'CPU')->first();
        $cpuProducts = Product::where('category_id', $cpuCategory->category_id)
            ->orderBy('sold_count', 'desc')
            ->take(8)
            ->get();

        $categories = Category::all();

        foreach ($hotProducts as $product) {
            $product->old_price = $product->discount_percent > 0
                ? $product->price / (1 - $product->discount_percent / 100)
                : null;
        }

        foreach ($cpuProducts as $product) {
            $product->old_price = $product->discount_percent > 0
                ? $product->price / (1 - $product->discount_percent / 100)
                : null;
        }

        return view('welcome', compact('hotProducts', 'cpuProducts', 'categories'));
    }
}
