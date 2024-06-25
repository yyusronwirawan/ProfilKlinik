@extends('layout.mainAdmin')

@section('content')


<div class="pagetitle">
    <h1>Data Users</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Users</li>
        </ol>
    </nav>
    @if(Session::has('pesan'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <a href="/dashboard/user/create" class="btn btn-primary text-white">Tambah Data <i class="bi bi-arrow-right-short"></i></a>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Admin Users</h5>

                    <!-- Default Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Role</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="align-middle">
                                <td><img src="{{ asset('images/user-image/'.$user->image) }}" alt="" width="100"></td>
                                <td>{{ $user->nama }}</td>

                                @if($user->role == '1')
                                <td>Adminstrator</td>
                                @elseif($user->role == '2')
                                <td>Social Media Admin</td>
                                @else
                                <td>Recruiter</td>
                                @endif

                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    <a href="/dashboard/user/{{$user->id}}/edit" class="btn btn-warning">Password Baru <i class="bi bi-arrow-right-short"></i></a>
                                    <form action="/dashboard/user/{{$user->id}}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- End Default Table Example -->
                </div>
            </div>

        </div>
    </div>
</section>

@endsection