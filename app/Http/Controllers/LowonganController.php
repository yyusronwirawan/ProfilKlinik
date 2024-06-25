<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LowonganController extends Controller
{

    public function index()
    {
        return view('adminView/lowongan', [
            'tittle' => 'Lowongan',
            'data' => Lowongan::latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }


    public function create()
    {
        return view('adminView/lowonganCreate', [
            'tittle' => 'Lowongan'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'posisi' => 'required|max:255',
            'slug' => 'required|unique:lowongans',
            'persyaratan' => 'required',
            'excerpt' => 'required',
            'periode_akhir' => 'required',
        ]);

        Lowongan::create($validatedData);

        return redirect('/dashboard/lowongan')->with('pesan', 'Lowongan baru berhasil ditambah');
    }


    public function show(Lowongan $lowongan)
    {
        return view('adminView/lowonganDetail', [
            'tittle' => 'Lowongan',
            'data' => $lowongan
        ]);
    }


    public function edit(Lowongan $lowongan)
    {
        return view('adminView/lowonganEdit', [
            'tittle' => 'Lowongan',
            'data' => $lowongan
        ]);
    }


    public function update(Request $request, Lowongan $lowongan)
    {
        $rules = ([
            'posisi' => 'required|max:255',
            'persyaratan' => 'required',
            'excerpt' => 'required',
        ]);

        if ($request->slug != $lowongan->slug) {
            $rules['slug'] = 'required|unique:lowongans';
        }

        $validatedData = $request->validate($rules);

        Lowongan::where('id', $lowongan->id)
            ->update($validatedData);

        return redirect('/dashboard/lowongan')->with('pesan', 'Lowongan berhasil di Update');
    }


    public function destroy(Lowongan $lowongan)
    {
        Lowongan::destroy($lowongan->id);

        return redirect('/dashboard/lowongan')->with('pesan', 'Lowongan berhasil di hapus');
    }
}
