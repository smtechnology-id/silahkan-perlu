@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-body">
            <h3>
                Data Acara Perjalanan Dinas
            </h3>
            <a href="{{ route('admin.addEvent') }}" class="btn btn-primary btn-sm my-2">Tambah Data</a>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Maksud Perjalanan Dinas</th>
                        <th>Tujuan</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Status Tindak Lanjut</th>
                        <th>Detail</th>
                        <th>Tidak Lanjut</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $event->maksud_perjalanan_dinas }}</td>
                            <td>{{ $event->tujuan }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('d F Y') }} -
                                {{ \Carbon\Carbon::parse($event->tanggal_selesai)->translatedFormat('d F Y') }}</td>
                            <td>{{ $event->status_tindak_lanjut }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#detail{{ $event->id }}">Detail</button>
                                <div id="detail{{ $event->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="standard-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="standard-modalLabel">Detail Perjalanan Dinas
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Detail Data</h5>
                                                <table class="table-borderless">
                                                    <tr>
                                                        <td>Maksud Perjalanan Dinas</td>
                                                        <td>:</td>
                                                        <td>{{ $event->maksud_perjalanan_dinas }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tujuan</td>
                                                        <td>:</td>
                                                        <td>{{ $event->tujuan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pelaksanaan </td>
                                                        <td>:</td>
                                                        <td>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('d F Y') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($event->tanggal_selesai)->translatedFormat('d F Y') }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pelaksana Peserta</td>
                                                        <td>:</td>
                                                        <td>{{ $event->pelaksana_peserta }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Latar Belakang / Urgensi</td>
                                                        <td>:</td>
                                                        <td>{{ $event->latar_belakang }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nomor Surat</td>
                                                        <td>:</td>
                                                        <td>{{ $event->nomor_surat }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nomor Surat</td>
                                                        <td>:</td>
                                                        <td>{{ \Carbon\Carbon::parse($event->tanggal_surat)->translatedFormat('d F Y') }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hasil Kegiatan</td>
                                                        <td>:</td>
                                                        <td>{{ $event->hasil_kegiatan }}</td>
                                                    </tr>
                                                </table>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#tindaklanjut{{ $event->id }}">Instruksi Tindak Lanjut</button>
                                <div id="tindaklanjut{{ $event->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="standard-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="standard-modalLabel">Detail Instrksi Tindak Lanjut
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Detail Data</h5>
                                                <table class="table-borderless">
                                                    <tr>
                                                        <td>Maksud Perjalanan Dinas</td>
                                                        <td>:</td>
                                                        <td>{{ $event->maksud_perjalanan_dinas }}</td>
                                                    </tr>
                                                </table>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm">Edit</a>
                                <form action="" method="POST" style="display:inline-block;">
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
