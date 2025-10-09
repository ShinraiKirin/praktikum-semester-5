<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function tampil($nilai)
    {
        if ($nilai % 2 == 0) {
            $type = 'success';
            $pesan = "Nilai $nilai adalah genap.";
        } else {
            $type = 'warning';
            $pesan = "Nilai $nilai adalah ganjil.";
        }

        return view('produk', [
            'type' => $type,
            'pesan' => $pesan
        ]);
    }
}
