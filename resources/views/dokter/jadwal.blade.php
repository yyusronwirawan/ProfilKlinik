@extends('layout.main')

@section('content')

<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5 class="widget-title ml-3">Filter Jadwal</h5>
                <form action="/dokter/jadwal">
                    <div class="input-group mb-3 ml-3">
                        <select name="search" class="form-control">
                            <option value="">Pilih Poliklinik..</option>
                            @foreach ($poliklinik as $poli)
                            @if(old('poliklinik_id') == $poli->id)
                            <option value="{{$poli->id}}" selected>{{ $poli->poliklinik }}</option>
                            @else
                            <option value="{{$poli->id}}">{{ $poli->poliklinik }}</option>
                            @endif
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                    <div class="input-group mb-3 ml-3">

                    </div>

                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col ">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama Dokter</th>
                                <th scope="col">Poliklinik</th>
                                <th scope="col">Lihat Jadwal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dokters as $data)
                            <tr>
                                <th><img src="{{ asset('images/dokter-image/'.$data->image) }}" width="150"></th>
                                <th>{{ $data->nama }}</th>
                                <td>{{ $data->poliklinik->poliklinik }}</td>
                                <td><a class="btn btn-primary" href="/dokter/profil/{{$data->slug}}">Lihat Jadwal <i class="fas fa-arrow-right"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-start ml-3">
                        {{$dokters->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection