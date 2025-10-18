<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk
     */
    public function index()
    {
        $products = Product::all();
        return view('master-data.product-master.index', compact('products'));
    }

    /**
     * Menampilkan form untuk menambah produk baru
     */
    public function create()
    {
        return view('master-data.product-master.create-product');
    }

    /**
     * Menyimpan produk baru ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:256',
            'unit' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'information' => 'nullable|string',
            'qty' => 'required|integer',
            'producer' => 'required|string|max:255',
        ]);

        Product::create($validated);

        return redirect()->route('product.index')
                         ->with('success', 'Product created successfully!');
    }

    /**
     * Menampilkan detail produk tertentu
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('master-data.product-master.show', compact('product'));
    }

    /**
     * Menampilkan form edit produk
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('master-data.product-master.edit-product', compact('product'));
    }

    /**
     * Mengupdate data produk
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:256',
            'unit' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'information' => 'nullable|string',
            'qty' => 'required|integer',
            'producer' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()->route('product.index')
                         ->with('success', 'Product updated successfully!');
    }

    /**
     * Menghapus produk
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')
                         ->with('success', 'Product deleted successfully!');
    }
}
