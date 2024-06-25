<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class User_Controller extends Controller
{


    //  kelola User
    public function index()
    {
        return view('adminView/user', [
            'tittle' => 'Kelola User',
            'users' => USer::all()
        ]);
    }
    public function create()
    {
        return view('adminView/userTambah', [
            'tittle' => 'Kelola User'
        ]);
    }

    public function createAdmin()
    {
        // Check if an admin user already exists
        $adminExists = User::where('role', 1)->exists();

        // Pass the $adminExists variable to the view
        return view('adminView.createAdmin', ['adminExists' => $adminExists]);
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama' => 'required|max:255',
                'role' => 'required',
                'email' => 'required',
                'username' => 'required|max:255|unique:users',
                'password' => 'required|min:6|max:255',
                'image' => 'image|file|max:1024'
            ]
        );

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/user-image'), $imageName);

        User::create([
            'nama' => $request->nama,
            'role' => $request->role,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'image' => $imageName,
        ]);

        Session::flash('pesan', 'User berhasil ditambah');

        return redirect('/dashboard/user');
    }

    public function edit(User $user)
    {
        return view('adminView/userEdit', [
            'tittle' => 'Edit USer',
            'data' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'password' => 'required|min:6|max:255'
            ]
        );

        User::where('id', $user->id)
            ->update(['password' => Hash::make($request->password)]);

        return redirect('/dashboard/user')->with('pesan', 'User berhasil di Update');
    }

    public function destroy(User $user)
    {
        if ($user->image) {
            File::delete(public_path('/images/user-image/' . $user->image));
        }

        User::destroy($user->id);

        return redirect('/dashboard/user')->with('pesan', 'User berhasil di hapus');
    }
}
