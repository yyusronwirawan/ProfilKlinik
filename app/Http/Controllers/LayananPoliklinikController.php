<?php

namespace App\Http\Controllers;

use App\Models\Layanan_poliklinik;
use Illuminate\Http\Request;

class LayananPoliklinikController extends Controller
{

    public function index()
    {
        return view('adminView/layananPoliklinik', [
            'tittle' => 'Layanan',
            'poliklinik' => Layanan_poliklinik::paginate(10)
        ]);
    }


    public function create()
    {
        return view('adminView/layananPoliklinikCreate', [
            'tittle' => 'Layanan'
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'poliklinik' => 'required|max:255',
            'slug' => 'required|unique:layanan_polikliniks',
            'ket' => 'required',
        ]);

        Layanan_poliklinik::create($validatedData);

        return redirect('/dashboard/layanan-poliklinik')->with('pesan', 'Poliklinik berhasil ditambah');
    }


    public function show(Layanan_poliklinik $layanan_poliklinik)
    {
        return view('adminView/layananImageCreate', [
            'tittle' => 'Layanan',
            'layanan' => $layanan_poliklinik
        ]);
    }


    public function edit(Layanan_poliklinik $layanan_poliklinik)
    {
        return view('adminView/layananPoliklinikEdit', [
            'tittle' => 'Layanan',
            'poli' => $layanan_poliklinik
        ]);
    }


    public function update(Request $request, Layanan_poliklinik $layanan_poliklinik)
    {
        $rules = ([
            'poliklinik' => 'required|max:255',
            'ket' => 'required',
        ]);

        if ($request->slug != $layanan_poliklinik->slug) {
            $rules['slug'] = 'required|unique:layanan_polikliniks';
        }

        $validatedData = $request->validate($rules);

        Layanan_poliklinik::where('id', $layanan_poliklinik->id)
            ->update($validatedData);

        return redirect('/dashboard/layanan-poliklinik')->with('pesan', 'Layanan Poliklinik berhasil di Update');
    }


    public function destroy(Layanan_poliklinik $layanan_poliklinik)
    {
        Layanan_poliklinik::destroy($layanan_poliklinik->id);

        return redirect('/dashboard/layanan-poliklinik')->with('pesan', 'Layanan Poliklinik berhasil di hapus');
    }
}
