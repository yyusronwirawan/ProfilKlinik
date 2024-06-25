<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnershipController extends Controller
{

    public function index()
    {
        return view('adminView/partnership', [
            'tittle' => 'Media',
            'partnerhip' => Partnership::all()
        ]);
    }


    public function create()
    {
        return view('adminView/partnershipCreate', [
            'tittle' => 'Media',
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_partner' => 'required',
            'image' => 'required|image|file|max:5120',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/partner-image'), $imageName);

        Partnership::create([
            'nama_partner' => $request->nama_partner,
            'image' => $imageName,
        ]);

        return redirect('/dashboard/partnership')->with('pesan', 'Partner berhasil ditambahkan');
    }

    public function destroy(Partnership $partnership)
    {
        if ($partnership->image) {
            File::delete(public_path('/images/banner-image/' . $partnership->image));
        }

        Partnership::destroy($partnership->id);

        return redirect('/dashboard/partnership')->with('pesan', 'Partnership berhasil di hapus');
    }
}
