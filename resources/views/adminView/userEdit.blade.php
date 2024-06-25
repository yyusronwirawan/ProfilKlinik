@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/user">Data User</a></li>
            <li class="breadcrumb-item active">Ubah Password</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>

                    <!-- No Labels Form -->
                    <form class="row g-3" action="/dashboard/user/{{$data->id}}" method="POST">
                        @method('put')
                        @csrf
                        <div class="col-md-6">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                            <span class="text-danger">*Buat password Baru</span>
                            @error('password')
                            <div class=" invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/user" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form><!-- End No Labels Form -->

                </div>
            </div>
        </div>
    </div>
</div>

@endsection