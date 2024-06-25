<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{

    public function index(Dokter $dokter)
    {
        return View('adminView/jadwalDokterCreate', [
            'tittle' => 'Dokter',
            'dokter' => $dokter,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dokter_id' => 'required',
            'poliklinik_id' => 'required',
            'hari' => 'required|max:255',
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        JadwalDokter::create($validatedData);

        return redirect('/dashboard/dokter')->with('pesan', 'jadwal dokter berhasil ditambah');
    }

    public function edit($id)
    {
        return view('adminView/jadwalDokterEdit', [
            'tittle' => 'Dokter',
            'jadwal' => JadwalDokter::where('dokter_id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'dokter_id' => 'required',
            'poliklinik_id' => 'required',
            'hari' => 'required|max:255',
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        JadwalDokter::where('id', $id)
            ->update($validatedData);

        return redirect('/dashboard/dokter')->with('pesan', 'jadwal dokter berhasil diupdate');
    }
}
