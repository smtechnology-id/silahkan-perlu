@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Divisi</h3>
            <hr>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addDivision">Tambah
                Divisi</button>
            <table class="table table-borderless">
                <thead>
                    <th>No</th>
                    <th>Nama Divisi</th>
                    <th>Total Kasus</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($divisi as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->name }}</td>
                            <td>
                                <button type="button" class="btn btn-secondary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#update{{ $row->id }}">
                                    <i class=" ri-ball-pen-line"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $row->id }}">
                                    <i class="ri-delete-bin-fill"></i>
                                </button>


                                <div id="update{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="standard-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="standard-modalLabel">Update Divisi</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.updateDivision') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group mb-2">
                                                        <label for="name">Nama Divisi</label>
                                                        <input type="text" name="name" id="name"
                                                            class="form-control" required value="{{ $row->name }}">
                                                        <input type="hidden" name="id" id="id"
                                                            class="form-control" required value="{{ $row->id }}">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
                                <div id="delete{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="standard-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="standard-modalLabel">Update Divisi</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin ingin menghapus data ini ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ route('admin.deleteDivisi', ['id' => $row->id]) }}" class="btn btn-danger">Delete</a>
                                                </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="addDivision" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Tambah Divisi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.addDivision') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Nama Divisi</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
