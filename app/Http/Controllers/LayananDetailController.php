<?php

namespace App\Http\Controllers;

use App\Models\LayananImage;
use App\Models\Layanan_poliklinik;

class LayananDetailController extends Controller
{
    public function index(Layanan_poliklinik $layanan_poliklinik)
    {
        return view('adminView/layananDetail', [
            'tittle' => 'Layanan',
            'images' => LayananImage::where('layanan_id', $layanan_poliklinik->id)->get(),
            'layanan' => $layanan_poliklinik
        ]);
    }
}
