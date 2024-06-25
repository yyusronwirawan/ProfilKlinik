@extends('layout.main')

@section('content')
<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="{{asset('images/dokter-image/'.$data->image)}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <p class="card-title" style="font-size: 1.875em;"><strong>{{ $data->nama }}</strong></p>
                            <span>
                                <p class="card-text text-muted">Poliklinik : {{ $data->poliklinik->poliklinik }}</p>
                            </span>
                            <br>
                            <h3>Jadwal Dokter</h3>
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Hari</th>
                                        <th scope="col">Jam Praktek</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        @if(is_null($jadwal))
                                        <td>jadwal belum ditentukan</td>
                                        @else
                                        <td>{{$jadwal->hari}}</td>
                                        @endif

                                        @if(is_null($jadwal))
                                        <td>jadwal belum ditentukan</td>
                                        @else
                                        <td>{{date("H:i", strtotime("$jadwal->dari"))}} - {{date("H:i", strtotime("$jadwal->sampai"))}}</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <br>
        <div class="row">
            <div class="col">
                <h4 class="card-title">Riwayat Dokter</h4>
                <p class="card-text">{!! $data->riwayat !!}</p>
            </div>
        </div>
    </div>
</section>
@endsection