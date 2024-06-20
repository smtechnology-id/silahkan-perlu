@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-body">
            <h3>
                Data Acara Perjalanan Dinas
            </h3>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Maksud Perjalanan Dinas</th>
                        <th>Tujuan</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Status Tindak Lanjut</th>
                        <th>Detail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->maksud_perjalanan_dinas }}</td>
                            <td>{{ $event->tujuan }}</td>
                            <td>{{ $event->tanggal_mulai->format('d-m-Y') }} - {{ $event->tanggal_selesai->format('d-m-Y') }}</td>
                            <td>{{ $event->status_tindak_lanjut }}</td>
                            <td>
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm">Detail</a>
                            </td>
                            <td>
                                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection