@extends('layouts.app')

@section('content')
    <div class="container-fluid py-2">
        <h3>Data Kasus</h3>
        <hr>
        <div class="table-responsive">
            <table class="table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Divisi</th>
                        <th>Nama Tersangka</th>
                        <th>Pasal yang disangkakan</th>
                        <th>Tanggal Perdamaian</th>
                        <th>Tanggal Publish</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($kasus as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->division->name }}</td>
                            <td>{{ $data->nama_tersangka }}</td>
                            <td>{{ $data->pasal_yang_disangkakan }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal_perdamaian)->isoFormat('D MMMM YYYY') }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal_publish)->isoFormat('D MMMM YYYY') }}</td>
                            <td>
                                <a href="{{ route('detailPerkara', ['slug' => $data->slug]) }}" target="_blank" class="btn btn-primary mb-2"><i class="bi bi-eye-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
