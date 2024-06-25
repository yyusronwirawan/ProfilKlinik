@extends('layout.mainLogin')

@section('content')
<main class="form-signin">
    <form action="/login" method="post">
        @csrf
        <img class="mb-4" src="Template/images/logo-gh-test.png" alt="" width="200">
        <h1 class="h3 mb-3 fw-normal">Form Login</h1>

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="form-floating">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukan username" autofocus required value="{{ old('username')}}">
            <label for="username">Username</label>
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="Password" name="password" placeholder="Masukan Password" required>
            <label for="Password">Password</label>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <a href="/" class="mt-2 w-100 btn btn-lg btn-secondary"> Cancel </a>
        <p class="mt-5 mb-3 text-muted">&copy; RS Graha Hermine</p>
    </form>
</main>
@endsection