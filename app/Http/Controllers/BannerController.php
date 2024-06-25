<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{

    public function index()
    {
        return view('adminView/banner', [
            'tittle' => 'Kelola Banner',
            'data' => Banner::latest()->paginate(5)
        ]);
    }


    public function create()
    {
        return view('adminView/bannerCreate', [
            'tittle' => 'Tambah Banner',
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'banner_title' => 'required|max:255',
            'image' => 'image|file|max:5120',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/banner-image'), $imageName);

        Banner::create([
            'banner_title' => $request->banner_title,
            'image' => $imageName,
        ]);

        return redirect('/dashboard/banner')->with('pesan', 'Banner berhasil ditambah');
    }

    public function show(Banner $banner)
    {
        return view('adminView/bannerShow', [
            'tittle' => 'Banner',
            'data' => $banner
        ]);
    }

    public function edit(Banner $banner)
    {
        return view('adminView/bannerEdit', [
            'tittle' => 'Edit Banner',
            'data' => $banner
        ]);
    }


    public function update(Request $request, Banner $banner)
    {
        $validatedData = $request->validate([
            'banner_title' => 'required|max:255',
            'image' => 'image|file|max:5120',
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                File::delete(public_path('/images/banner-image/' . $banner->image));
            }
            $validatedData['image'] =
                $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/banner-image'), $imageName);
        }

        Banner::where('id', $banner->id)
            ->update([
                'banner_title' => $request->banner_title,
                'image' => $imageName,
            ]);

        return redirect('/dashboard/banner')->with('pesan', 'Banner berhasil di Update');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image) {
            File::delete(public_path('/images/banner-image/' . $banner->image));
        }

        Banner::destroy($banner->id);

        return redirect('/dashboard/banner')->with('pesan', 'Banner berhasil di hapus');
    }
}
