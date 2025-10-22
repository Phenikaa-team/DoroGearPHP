<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function show($id): Factory|View
    {
        $category = Category::with('products')->findOrFail($id);

        $products = $category->products()->paginate(12);

        foreach ($products as $product) {
            $product->old_price = $product->discount_percent > 0
                ? $product->price / (1 - $product->discount_percent / 100)
                : null;
        }

        return view('categories.show', compact('category', 'products'));
    }
}
