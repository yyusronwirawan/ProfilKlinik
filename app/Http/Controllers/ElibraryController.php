<?php

namespace App\Http\Controllers;

use App\Models\Elibrary;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ElibraryController extends Controller
{

    public function index()
    {
        return view('adminView/library', [
            'tittle' => 'E-Library',
            'books' => Elibrary::latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }


    public function create()
    {
        return view('adminView/libraryCreate', [
            'tittle' => 'E-Library',
            'folders' => Folder::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'penulis' => 'required|max:255',
            'tahun' => 'required|max:255',
            'folder_id' => 'required',
            'file_buku' => 'required|file|mimes:pdf',
        ]);

        $fileName = time() . '.' . $request->file_buku->extension();
        $request->file_buku->move(public_path('file/file-buku'), $fileName);

        Elibrary::create([
            'title' => $request->title,
            'penulis' => $request->penulis,
            'tahun' => $request->tahun,
            'folder_id' => $request->folder_id,
            'file_buku' => $fileName,
        ]);

        return redirect('/dashboard/e-library')->with('pesan', 'buku Berhasil ditambah');
    }


    public function destroy(Elibrary $elibrary, $id)
    {
        if ($elibrary->file_buku) {
            File::delete(public_path('/file/file-buku/' . $elibrary->file_buku));
        }

        Elibrary::destroy($id);

        return redirect('/dashboard/e-library')->with('pesan', 'Buku berhasil di hapus');
    }
}
