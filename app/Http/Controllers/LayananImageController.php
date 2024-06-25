<?php

namespace App\Http\Controllers;

use App\Models\LayananImage;
use App\Models\Layanan_poliklinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LayananImageController extends Controller
{

    public function index()
    {
        return view('adminView/layananImageData', [
            'tittle' => 'Layanan',
            'data' => LayananImage::all()
        ]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required',
            'image' => 'required|image|file|max:5120',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/layanan-poliklinik-image'), $imageName);

        LayananImage::create([
            'layanan_id' => $request->layanan_id,
            'image' => $imageName,
        ]);

        return redirect('/dashboard/layanan-poliklinik')->with('pesan', 'gambar layanan berhasil ditambah');
    }


    public function edit(LayananImage $layananImage)
    {
        return view('adminView/layananImageEdit', [
            'tittle' => 'Layanan',
            'data' => $layananImage
        ]);
    }


    public function update(Request $request, LayananImage $layananImage)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:5120',
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                File::delete(public_path('/images/layanan-poliklinik-image/' . $layananImage->image));
            }
            $validatedData['image'] =
                $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/layanan-poliklinik-image'), $imageName);
        }

        LayananImage::where('id', $layananImage->id)
            ->update([
                'layanan_id' => $request->layanan_id,
                'image' => $imageName,
            ]);

        return redirect('/dashboard/layananImage')->with('pesan', 'gambar layanan berhasil diupdate');
    }


    public function destroy(LayananImage $layananImage)
    {
        if ($layananImage->image) {
            File::delete(public_path('/images/layanan-poliklinik-image/' . $layananImage->image));
        }

        LayananImage::destroy($layananImage->id);

        return redirect('/dashboard/layananImage')->with('pesan', 'gambar layanan berhasil dihapus');
    }
}
