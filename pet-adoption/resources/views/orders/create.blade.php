<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <h2 class="font-semibold text-xl mb-6 text-gray-800">New Order</h2>

                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf

                   
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Select Customer</label>
                        <select name="customer_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="" disabled selected>-- Choose a Customer --</option>
                            @forelse($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @empty
                                <option value="" disabled>No customers found. Please add one first.</option>
                            @endforelse
                        </select>
                    </div>

                   
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Select Product</label>
                        <select name="product_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="" disabled selected>-- Choose a Product --</option>
                            @forelse($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} (${{ number_format($product->price, 2) }})</option>
                            @empty
                                <option value="" disabled>No products found. Please add one first.</option>
                            @endforelse
                        </select>
                    </div>

                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Quantity</label>
                        <input type="number" name="quantity" min="1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    
<div class="flex items-center justify-end mt-8 border-t pt-4"> 
    <a href="{{ route('orders.index') }}" class="text-sm text-gray-600 hover:underline mr-6">
        Cancel
    </a>
    <button type="submit" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
        Place Order
    </button>
</div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>