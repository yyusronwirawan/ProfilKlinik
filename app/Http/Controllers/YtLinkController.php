<?php

namespace App\Http\Controllers;

use App\Models\YtLink;
use Illuminate\Http\Request;

class YtLinkController extends Controller
{

    public function index()
    {
        return view('adminView/ytLinks', [
            'tittle' => 'Media',
            'links' => YtLink::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('adminView/ytLinksTambah', [
            'tittle' => 'Media'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|max:255',
                'embed_link' => 'required',
            ]
        );

        YtLink::create($validatedData);

        return redirect('/dashboard/yt')->with('pesan', 'Video berhasil ditambah');
    }


    public function destroy($id)
    {
        YtLink::destroy($id);

        return redirect('/dashboard/yt')->with('pesan', 'Link berhasil di hapus');
    }
}
