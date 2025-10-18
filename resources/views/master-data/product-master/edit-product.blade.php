<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('product.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
                        <input type="text" name="product_name" class="w-full border-gray-300 rounded-md" value="{{ $product->product_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Satuan</label>
                        <input type="text" name="unit" class="w-full border-gray-300 rounded-md" value="{{ $product->unit }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Jenis</label>
                        <input type="text" name="type" class="w-full border-gray-300 rounded-md" value="{{ $product->type }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                        <textarea name="information" class="w-full border-gray-300 rounded-md">{{ $product->information }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Qty</label>
                        <input type="number" name="qty" class="w-full border-gray-300 rounded-md" value="{{ $product->qty }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Produsen</label>
                        <input type="text" name="producer" class="w-full border-gray-300 rounded-md" value="{{ $product->producer }}" required>
                    </div>

                    <div class="flex gap-2">
                        <button class="px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-700">Update</button>
                        <a href="{{ route('product.index') }}" class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
