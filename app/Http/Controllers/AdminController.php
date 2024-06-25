<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Dokter;
use App\Models\User;

class AdminController extends Controller
{

    public function createAdmin()
    {
        // Check if an admin user already exists
        $adminExists = User::where('role', 1)->exists();

        // Pass the $adminExists variable to the view
        return view('adminView.createAdmin', ['adminExists' => $adminExists]);
    }
    public function index()
    {
        return view('adminView/dashboard', [
            'tittle' => 'Dashboard',
            'data' => Banner::all(),
            'posts' => Blog::latest()->filter(request(['search', 'category']))->paginate(3)->withQueryString(),
            'dokters' => Dokter::paginate(3)
        ]);
    }
}
