<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\KategoriGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{

    public function index()
    {
        return view('adminView/galeri', [
            'tittle' => 'Media',
            'galeri' => Galeri::latest()->paginate(5)
        ]);
    }

    public function create()
    {
        return view('adminView/galeriCreate', [
            'tittle' => 'Media',
            'kategories' => KategoriGaleri::all()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title_galeri' => 'required|max:255',
            'slug' => 'required',
            'keterangan' => 'required',
            'kategori_id' => 'required',
            'image' => 'required|image|file|max:5120'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/galeri-image'), $imageName);

        Galeri::create([
            'title_galeri' => $request->title_galeri,
            'slug' => $request->slug,
            'keterangan' => $request->keterangan,
            'kategori_id' => $request->kategori_id,
            'image' => $imageName,
        ]);

        return redirect('/dashboard/galeri')->with('pesan', 'Foto galeri berhasil ditambah');
    }


    public function destroy(Galeri $galeri)
    {
        if ($galeri->image) {
            File::delete(public_path('/images/galeri-image/' . $galeri->image));
        }

        Galeri::destroy($galeri->id);

        return redirect('/dashboard/galeri')->with('pesan', 'Foto galeri berhasil di hapus');
    }
}
