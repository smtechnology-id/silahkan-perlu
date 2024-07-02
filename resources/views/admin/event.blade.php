@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-body">
            <h3>
                Data Acara Perjalanan Dinas Baru
            </h3>
            <a href="{{ route('admin.addEvent') }}" class="btn btn-primary btn-sm my-2">Tambah Data</a>
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
                                <td>
                                    @if ($event->status_tindak_lanjut == 'Belum Ada Instruksi')
                                        <span class="text-danger font-weight-bold">{{ $event->status_tindak_lanjut }}</span>
                                    @else
                                        {
                                        <span class="text-success font-weight-bold">{{ $event->status_tindak_lanjut }}</span>
                                        }
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

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#update{{ $event->id }}"><i
                                            class="bi bi-pencil-square"></i></button>

                                    <div id="update{{ $event->id }}" class="modal fade" tabindex="-1" role="dialog"
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
                                                    <h5>Update Data</h5>
                                                    <form action="{{ route('admin.updateEventPost') }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-2">
                                                                    <label for="maksud_perjalanan_dinas">Maksud Perjalanan
                                                                        Dinas</label>
                                                                    <input type="text" name="maksud_perjalanan_dinas"
                                                                        class="form-control" id="maksud_perjalanan_dinas"
                                                                        required
                                                                        value="{{ $event->maksud_perjalanan_dinas }}">
                                                                    <input type="hidden" name="id"
                                                                        class="form-control" id="id" required
                                                                        value="{{ $event->id }}">
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <label for="tujuan">Tujuan</label>
                                                                    <input type="text" name="tujuan"
                                                                        class="form-control" id="tujuan" required
                                                                        value="{{ $event->tujuan }}">
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <span>Tanggal Pelaksanaan</span>
                                                                    <div class="col-6">
                                                                        <div class="form-group mb-2">
                                                                            <label for="tanggal_mulai">Tanggal
                                                                                Mulai</label>
                                                                            <input type="date" name="tanggal_mulai"
                                                                                class="form-control" id="tanggal_mulai"
                                                                                required
                                                                                value="{{ $event->tanggal_mulai }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group mb-2">
                                                                            <label for="tanggal_selesai">Tanggal
                                                                                Selesai</label>
                                                                            <input type="date" name="tanggal_selesai"
                                                                                class="form-control" id="tanggal_selesai"
                                                                                required
                                                                                value="{{ $event->tanggal_selesai }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <label
                                                                        for="pelaksana_peserta">Pelaksana/Peserta</label>
                                                                    <input type="text" name="pelaksana_peserta"
                                                                        class="form-control" id="pelaksana_peserta"
                                                                        required value="{{ $event->pelaksana_peserta }}">
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <span>Latar Belakang Perjalanan Dinas</span>
                                                                    <div class="col-12">
                                                                        <div class="form-group mb-2">
                                                                            <label for="latar_belakang">Latar Belakang /
                                                                                Urgensi</label>
                                                                            <textarea name="latar_belakang" class="form-control" id="latar_belakang" required>{{ $event->latar_belakang }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group mb-2">
                                                                            <label for="nomor_surat">Nomor Surat</label>
                                                                            <input type="text" name="nomor_surat"
                                                                                class="form-control" id="nomor_surat"
                                                                                value="{{ $event->nomor_surat }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group mb-2">
                                                                            <label for="tanggal_surat">Tanggal
                                                                                Surat</label>
                                                                            <input type="date" name="tanggal_surat"
                                                                                class="form-control" id="tanggal_surat"
                                                                                value="{{ $event->tanggal_surat }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">

                                                                <div class="form-group mb-2">
                                                                    <label for="hasil_kegiatan">Hasil Kegiatan</label>
                                                                    <textarea name="hasil_kegiatan" class="form-control" id="hasil_kegiatan" required rows="10">{{ $event->hasil_kegiatan }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary">Submit
                                                                        Data</button>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                    <form action="{{route('admin.deleteEventPost')}}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$event->id}}">
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
