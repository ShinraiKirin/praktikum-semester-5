<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //
    }

    public function store(Request $request)
    {
        //
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
