<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-medium text-gray-900">Recent Orders</h2>
                    <a href="{{ route('orders.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150 shadow-sm">
                        + Add New Order
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b bg-gray-50">
                                <th class="py-3 px-4 text-sm font-semibold text-gray-700">CUSTOMER</th>
                                <th class="py-3 px-4 text-sm font-semibold text-gray-700">PRODUCT</th>
                                <th class="py-3 px-4 text-sm font-semibold text-gray-700 text-center">QTY</th>
                                <th class="py-3 px-4 text-sm font-semibold text-gray-700 text-right">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($orders as $order)
                            <tr class="hover:bg-gray-50 transition">
                                
                                <td class="py-4 px-4 text-sm text-gray-900">
                                    {{ $order->customer->name ?? 'Deleted Customer' }}
                                </td>

                               
                                <td class="py-4 px-4 text-sm text-gray-900">
                                    <span class="font-medium">{{ $order->product->name ?? 'N/A' }}</span>
                                    <div class="text-xs text-gray-500">${{ number_format($order->product->price ?? 0, 2) }}</div>
                                </td>

                                
                                <td class="py-4 px-4 text-sm text-gray-900 text-center">
                                    {{ $order->quantity ?? $order->qty }}
                                </td>

                                <td class="py-4 px-4 text-sm text-right">
                                    @if(auth()->id() == $order->user_id)
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-900 font-medium underline" 
                                                    onclick="return confirm('Are you sure you want to delete this order?')">
                                                Delete
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 italic text-xs">No Access</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="py-12 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                        <p>No orders found. Click "Add New Order" to start.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>