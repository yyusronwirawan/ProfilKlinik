<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogCategory extends Controller
{
    public function index()
    {
        return view('adminView/blogCategoryCreate', [
            'tittle' => 'Tambah Category Post'
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate(
            [
                'kategori' => 'required|max:255|unique:post_categories',
                'slug' => 'required|max:255|unique:post_categories',
            ]
        );

        PostCategory::create($validatedData);

        Session::flash('pesan', 'kategori baru berhasil ditambahkan');

        return redirect('/blog');
    }
}
