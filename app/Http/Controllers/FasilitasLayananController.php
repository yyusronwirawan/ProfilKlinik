<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas_Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FasilitasLayananController extends Controller
{

    public function index()
    {
        return view('adminView/fasilitasLayanan', [
            'tittle' => 'Layanan',
            'fasilitas' => Fasilitas_Layanan::paginate(5)
        ]);
    }


    public function create()
    {
        return view('adminView/fasilitasLayananCreate', [
            'tittle' => 'Layanan'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|max:255',
            'slug' => 'required|unique:fasilitas__layanans',
            'image' => 'required|image|file|max:5120',
            'kategori' => 'required',
            'ket' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/fasilitas-layanan-image'), $imageName);

        Fasilitas_Layanan::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'slug' => $request->slug,
            'kategori' => $request->kategori,
            'ket' => $request->ket,
            'image' => $imageName,
        ]);

        return redirect('/dashboard/fasilitas-layanan')->with('pesan', 'Fasilitas layanan berhasil ditambah');
    }



    public function edit($id)
    {
        return view('adminView/fasilitasLayananEdit', [
            'tittle' => 'Layanan',
            'fasilitas' => Fasilitas_Layanan::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_fasilitas' => 'required|max:255',
            'image' => 'image|file|max:5120',
            'slug' => 'required',
            'kategori' => 'required',
            'ket' => 'required',
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                File::delete(public_path('/images/fasilitas-layanan-image/' . $request->oldImage));
            }
            $validatedData['image'] =
                $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/fasilitas-layanan-image'), $imageName);
        }

        Fasilitas_Layanan::where('id', $id)
            ->update($validatedData);

        return redirect('/dashboard/fasilitas-layanan')->with('pesan', 'Fasilitas layanan berhasil diUpdate');
    }

    public function destroy(Fasilitas_Layanan $fasilitas_Layanan, $id)
    {
        if ($fasilitas_Layanan->image) {
            File::delete(public_path('/images/fasilitas-layanan-image/' . $fasilitas_Layanan->image));
        }

        Fasilitas_Layanan::destroy($id);

        return redirect('/dashboard/fasilitas-layanan')->with('pesan', 'Fasilitas berhasil di hapus');
    }
}
