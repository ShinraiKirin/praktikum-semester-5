<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    // menerima parameter angka dari route
    public function index($angka)
    {
        // contoh: angka ditambah 10
        $hasil = $angka + 10;

        // lempar hasil ke view
        return view('products.index', compact(var_name: 'hasil'));
    }

    public function create()
    {
        return view('master-data.product-master.create-product');
    }

public function store(Request $request) {
        $validasi_data = $request -> validate([
            'product_name' => 'required | string | max:256',
            'unit' => 'required | string | max:50',
            'type' => 'required | string | max:50',
            'information' => 'nullable | string',
            'qty'=> 'required | integer',
            'producer'=> 'required | string | max:255'
        ]);

        Product::create($validasi_data);
        return redirect()->back()->with('success', 'product created successfully');
    }
    public function show(string $id)
    {
        return view('barang', ['isi_data' => $id]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
