<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::active()->featured()->ordered()->get();
        $products = Product::active()->ordered()->paginate(12);
        
        return view('products.index', compact('products', 'featuredProducts'));
    }

    public function show(Product $product)
    {
        if (!$product->is_active) {
            abort(404);
        }

        $relatedProducts = Product::active()
            ->where('id', '!=', $product->id)
            ->when($product->category, function ($query) use ($product) {
                return $query->where('category', $product->category);
            })
            ->limit(3)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
