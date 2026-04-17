<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        
        $orders = Order::with(['customer', 'product'])
            ->where('user_id', auth()->id())
            ->get();
            
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        
        $customers = Customer::where('user_id', auth()->id())->get();
        $products = Product::where('user_id', auth()->id())->get();

        return view('orders.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

       Order::create([
    'customer_id' => $request->customer_id,
    'product_id' => $request->product_id,
    'quantity' => $request->quantity, 
    'user_id' => auth()->id(),
]);

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    public function destroy(Order $order)
    {
        if ($order->user_id !== auth()->id()) abort(403);
        $order->delete();
        return redirect()->route('orders.index');
    }
}