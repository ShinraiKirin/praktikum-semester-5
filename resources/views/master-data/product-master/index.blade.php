<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Product List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <x-auth-session-status class="mb-4" :status="session('success')" />

                    <a href="{{ route('product.create') }}" 
                       class="mb-4 inline-block px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-700">
                       + Add Product
                    </a>

                    <table class="min-w-full border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-2 border">No</th>
                                <th class="p-2 border">Name</th>
                                <th class="p-2 border">Unit</th>
                                <th class="p-2 border">Type</th>
                                <th class="p-2 border">Qty</th>
                                <th class="p-2 border">Producer</th>
                                <th class="p-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $i => $product)
                                <tr class="text-center border-b">
                                    <td class="p-2">{{ $i + 1 }}</td>
                                    <td class="p-2">{{ $product->product_name }}</td>
                                    <td class="p-2">{{ $product->unit }}</td>
                                    <td class="p-2">{{ $product->type }}</td>
                                    <td class="p-2">{{ $product->qty }}</td>
                                    <td class="p-2">{{ $product->producer }}</td>
                                    <td class="p-2 text-center">
                                        <div class="flex justify-center gap-2">
                                            {{-- Tombol Edit --}}
                                            <a href="{{ route('product.edit', $product->id) }}" 
                                               class="px-3 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                                Edit
                                            </a>

                                            {{-- Tombol Delete --}}
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" 
                                                  onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="px-3 py-1 text-white bg-red-600 rounded hover:bg-red-700">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
