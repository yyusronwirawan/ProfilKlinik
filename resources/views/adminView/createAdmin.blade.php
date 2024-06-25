@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Admin User</div>

                    <div class="card-body">
                        @if ($adminExists)
                            <p>Admin user already exists!</p>
                        @else
                            <form action="{{ route('create.admin') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Create Admin User</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
