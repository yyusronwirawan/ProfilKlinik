<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Support\Facades\File;

class LamaranController extends Controller
{
    public function index(Lowongan $lowongan)
    {
        return view('adminView/lowonganPelamar', [
            'tittle' => 'Lowongan',
            'pelamar' => Lamaran::where('lowongan_id', $lowongan->id)->latest()->get(),
            'data' => $lowongan
        ]);
    }


    public function destroy(Lamaran $lamaran)
    {
        if ($lamaran->cv) {
            File::delete(public_path('/file/file-lamaran/' . $lamaran->cv));
        }

        Lamaran::destroy($lamaran->id);

        return redirect('/dashboard/lowongan')->with('pesan', 'Data pelamar berhasil di hapus');
    }
}
