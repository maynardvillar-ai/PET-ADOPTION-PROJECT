<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        
        $customers = Customer::where('user_id', auth()->id())
                             ->latest()
                             ->get();
                             
        return view('customers.index', compact('customers'));
    }

    
    public function create()
    {
        return view('customers.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_id' => auth()->id(), 
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }

    
    public function edit(Customer $customer)
    {
       
        if ($customer->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('customers.edit', compact('customer'));
    }

    
    public function update(Request $request, Customer $customer)
    {
        
        if ($customer->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated!');
    }

    
    public function destroy(Customer $customer)
    {
       
        if ($customer->user_id !== auth()->id()) {
            abort(403);
        }

        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted.');
    }
}