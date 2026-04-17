<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Add New Customer</h2></x-slot>
    <div class="py-12">
        <div class="max-w-md mx-auto bg-white p-6 shadow-sm sm:rounded-lg border">
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition">Save Customer</button>
            </form>
        </div>
    </div>
</x-app-layout>