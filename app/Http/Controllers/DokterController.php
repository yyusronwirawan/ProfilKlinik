<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use App\Models\Layanan_poliklinik;
use Illuminate\Support\Facades\File;

class DokterController extends Controller
{

    public function index()
    {
        return view('adminView/dokter', [
            'tittle' => 'Dokter',
            'dokters' => Dokter::latest()->filter(request(['search', 'poliklinik']))->paginate(7)->withQueryString()

        ]);
    }


    public function create()
    {
        return view('adminView/dokterCreate', [
            'tittle' => 'Dokter',
            'poliklinik' => Layanan_poliklinik::all()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|unique:dokters',
            'poliklinik_id' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:dokters',
            'alamat_domisili' => 'required|max:255',
            'image' => 'image|file|max:5120',
            'riwayat' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/dokter-image'), $imageName);

        Dokter::create([
            'nama' => $request->nama,
            'slug' => $request->slug,
            'poliklinik_id' => $request->poliklinik_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat_domisili' => $request->alamat_domisili,
            'riwayat' => $request->riwayat,
            'image' => $imageName,
        ]);

        return redirect('/dashboard/dokter')->with('pesan', 'dokter berhasil ditambah');
    }


    public function show(Dokter $dokter)
    {

        return view('adminView/dokterDetail', [
            'tittle' => 'Dokter',
            'jadwal' => JadwalDokter::where('dokter_id', $dokter->id)->first(),
            'dokter' => $dokter
        ]);
    }


    public function edit(Dokter $dokter)
    {
        return view('adminView/dokterEdit', [
            'tittle' => 'Dokter',
            'dokter' => $dokter,
            'poliklinik' => Layanan_poliklinik::all()
        ]);
    }


    public function update(Request $request, Dokter $dokter)
    {
        $rules = ([
            'nama' => 'required|max:255',
            'poliklinik_id' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'alamat_domisili' => 'required|max:255',
            'image' => 'image|file|max:5120',
            'riwayat' => 'required'
        ]);

        if ($request->slug != $dokter->slug) {
            $rules['slug'] = 'required|unique:dokters';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                File::delete(public_path('/images/dokter-image/' . $dokter->image));
            }
            $validatedData['image'] =
                $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/dokter-image'), $imageName);
        }

        Dokter::where('id', $dokter->id)
            ->update([
                'nama' => $request->nama,
                'slug' => $request->slug,
                'poliklinik_id' => $request->poliklinik_id,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'alamat_domisili' => $request->alamat_domisili,
                'riwayat' => $request->riwayat,
                'image' => $imageName,
            ]);

        return redirect('/dashboard/dokter')->with('pesan', 'dokter berhasil diupdate');
    }


    public function destroy(Dokter $dokter)
    {
        if ($dokter->image) {
            File::delete(public_path('/images/dokter-image/' . $dokter->image));
        }

        Dokter::destroy($dokter->id);

        return redirect('/dashboard/dokter')->with('pesan', 'Data dokter berhasil di hapus');
    }
}
