@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-body">
            <h3>
                Data Acara Perjalanan Dinas Selesai Ditindak Lanjuti / Completed
            </h3>
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Maksud Perjalanan Dinas</th>
                            <th>Tujuan</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Status Tindak Lanjut</th>
                            <th>Detail</th>
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
                                <td>
                                    @if ($event->status_tindak_lanjut == 'Belum Ada Instruksi')
                                        <span class="text-danger font-weight-bold">{{ $event->status_tindak_lanjut }}</span>
                                    @else
                                        <span class="text-success font-weight-bold">{{ $event->status_tindak_lanjut }}</span>
                                    @endif
                                </td>
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
                                                            <td>Tanggal Surat</td>
                                                            <td>:</td>
                                                            <td>{{ $event->tanggal_surat }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hasil Kegiatan</td>
                                                            <td>:</td>
                                                            <td>{{ $event->hasil_kegiatan }}</td>
                                                        </tr>
                                                    </table>
                                                    <hr>
                                                    <h5>Instruksi Tindak Lanjut</h5>
                                                    <hr>
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td>Rencana Kegiatan</td>
                                                            <td>:</td>
                                                            <td>{{ $event->rencana_kegiatan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Rencana Waktu</td>
                                                            <td>:</td>
                                                            <td> {{ \Carbon\Carbon::parse($event->rencana_waktu)->translatedFormat('F Y') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pelaksanaan Kegiatan</td>
                                                            <td>:</td>
                                                            <td>{{ $event->pelaksanaan_kegiatan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pelaksanaan Waktu</td>
                                                            <td>:</td>
                                                            <td> {{ \Carbon\Carbon::parse($event->pelaksanaan_waktu)->translatedFormat('d F Y') }}
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                    <form action="{{ route('admin.deleteEventPost') }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $event->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
