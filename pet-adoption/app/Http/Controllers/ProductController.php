<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        
        $products = Product::where('user_id', auth()->id())->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => auth()->id(), 
        ]);

        return redirect()->route('products.index')->with('success', 'Product added!');
    }

    
    public function destroy(Product $product)
    {
        if ($product->user_id !== auth()->id()) {
            abort(403);
        }
        $product->delete();
        return redirect()->route('products.index');
    }
}