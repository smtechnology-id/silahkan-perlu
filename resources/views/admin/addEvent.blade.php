@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Form Add Data Perjalanan Dinas</h2>
            <hr>
            <form action="{{ route('admin.addEventPost') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="maksud_perjalanan_dinas">Maksud Perjalanan Dinas</label>
                            <input type="text" name="maksud_perjalanan_dinas" class="form-control"
                                id="maksud_perjalanan_dinas" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" name="tujuan" class="form-control" id="tujuan" required>
                        </div>
                        <hr>
                        <div class="row">
                            <span>Tanggal Pelaksanaan</span>
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" class="form-control" id="tanggal_mulai" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" class="form-control" id="tanggal_selesai" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label for="pelaksana_peserta">Pelaksana/Peserta</label>
                            <input type="text" name="pelaksana_peserta" class="form-control" id="pelaksana_peserta"
                                required>
                        </div>
                        <hr>
                        <div class="row">
                            <span>Latar Belakang Perjalanan Dinas</span>
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <label for="latar_belakang">Latar Belakang / Urgensi</label>
                                    <textarea name="latar_belakang" class="form-control" id="latar_belakang" required></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="nomor_surat">Nomor Surat</label>
                                    <input type="text" name="nomor_surat" class="form-control" id="nomor_surat">
                                    <label for="" class="text-small text-danger">*Kosongkan Jika Tidak Perlu</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="tanggal_surat">Tanggal Surat</label>
                                    <input type="date" name="tanggal_surat" class="form-control" id="tanggal_surat">
                                    <label for="" class="text-small text-danger">*Kosongkan Jika Tidak Perlu</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group mb-2">
                            <label for="hasil_kegiatan">Hasil Kegiatan</label>
                            <textarea name="hasil_kegiatan" class="form-control" id="hasil_kegiatan" required rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit Data</button>
                        </div>
                    </div>
                </div>

               
                
            </form>
        </div>
    </div>
@endsection
