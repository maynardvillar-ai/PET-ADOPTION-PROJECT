<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Customers List</h2>
            @if(auth()->user()->is_admin)
                <a href="{{ route('customers.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">Add Customer</a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Name</th>
                            <th class="py-2">Email</th>
                            <th class="py-2 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3">{{ $customer->name }}</td>
                            <td class="py-3">{{ $customer->email }}</td>
                            <td class="py-3 text-right">
                                @if(auth()->user()->is_admin)
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="text-indigo-600 hover:underline mr-3">Edit</a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:underline" onclick="return confirm('Delete customer?')">Delete</button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-xs italic">View Only</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>