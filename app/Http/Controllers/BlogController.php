<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{

    public function index()
    {
        return view('adminView/blog', [
            'tittle' => 'RSGH Blog',
            'posts' => Blog::latest()->filter(request(['search', 'category']))->paginate(3)->withQueryString()
        ]);
    }


    public function create()
    {
        return view('adminView/blogCreate', [
            'tittle' => 'Tambah Post',
            'categories' => PostCategory::all()
        ]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:blogs',
            'category_id' => 'required',
            'image' => 'image|file|max:5120',
            'body' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/blog-image'), $imageName);

        Blog::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'body' => $request->body,
            'user_id' => auth()->user()->id,
            'excerpt' => Str::limit(Strip_tags($request->body), 200),
            'image' => $imageName,
        ]);

        return redirect('/blog')->with('pesan', 'Post berhasil ditambah');
    }

    public function show(Blog $blog)
    {
        return view('adminView/blogDetail', [
            'tittle' => 'Detail Post',
            'data' => $blog
        ]);
    }


    public function edit(Blog $blog)
    {
        return view('adminView/blogEdit', [
            'tittle' => 'Edit Post',
            'post' => $blog,
            'categories' => PostCategory::all()
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:5120',
            'body' => 'required',
        ];

        if ($request->slug != $blog->slug) {
            $rules['slug'] = 'required|unique:blogs';
        }

        $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                File::delete(public_path('/images/blog-image/' . $blog->image));
            }
            $rules['image'] =
                $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/blog-image'), $imageName);
        }

        Blog::where('id', $blog->id)
            ->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'category_id' => $request->category_id,
                'body' => $request->body,
                'user_id' => auth()->user()->id,
                'excerpt' => Str::limit(Strip_tags($request->body), 200),
                'image' => $imageName,
            ]);

        return redirect('/blog')->with('pesan', 'Post berhasil di Update');
    }


    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            File::delete(public_path('/images/blog-image/' . $blog->image));
        }

        Blog::destroy($blog->id);

        return redirect('/blog')->with('pesan', 'Post berhasil di hapus');
    }
}
