<?php

namespace App\Http\Controllers;

use App\Models\KategoriGaleri;
use Illuminate\Http\Request;

class KategoriGaleriController extends Controller
{

    public function create()
    {
        return view('adminView/galeriCatCreate', [
            'tittle' => 'Media'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'galeri_kategori' => 'required|max:255',
        ]);

        KategoriGaleri::create($validatedData);

        return redirect('/dashboard/galeri')->with('pesan', 'Kategori galeri berhasil ditambah');
    }
}
