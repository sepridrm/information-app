@extends('adminlte::page')

@section('title', 'Data Video Informasi')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Video Informasi</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Master {{ __('sidebar.video') }}
                        <button type="button" class="btn btn-success btn-sm btnTambah">Tambah</button>
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool btnRefresh" title="Refresh table"><i
                                class="fas fa-sync"></i></button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table-data" class="table table-striped table-bordered table-hover cell-border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Video</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        @if ($item->path != '')
                                            <video width="300px" height="100px" controls>
                                                <source src="{{ asset('storage') }}/{{ substr($item->path, 7) }}"
                                                    type="video/mp4">
                                            </video>
                                        @else
                                            <img width="100px" height="100px"
                                                src="{{ asset('storage/assets/default.jpg') }}" />
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('video.edit', ['video' => Crypt::encrypt($item->id)]) }}"
                                            class="btn btn-sm btn-warning btn-round btn-icon d-inline-block">
                                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                        </a>

                                        @if ($item->aktif == 1)
                                            <a href="#" id="change-item" class="btn btn-sm btn-success"
                                                data-id_item="{{ $item->id }}" data-toggle="tooltip" data-st="0"
                                                data-status="Tidak Aktif" data-menu="item" data-nama="{{ $item->nama }}"
                                                data-original-title="Change data">
                                                Aktif
                                            </a>
                                        @else
                                            <a href="#" id="change-item" class="btn btn-sm btn-danger"
                                                data-id_item="{{ $item->id }}" data-toggle="tooltip" data-st="1"
                                                data-status="Aktif" data-menu="item" data-nama="{{ $item->nama }}"
                                                data-original-title="Change data">
                                                Tidak Aktif
                                            </a>
                                        @endif

                                        <a href="#" id="delete-item" class="btn btn-sm btn-danger"
                                            data-id_item="{{ $item->id }}" data-toggle="tooltip" data-menu="item"
                                            data-nama="{{ $item->nama }}" data-original-title="Delete data">
                                            <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-merk">
        <div class="modal-dialog modal-lg">
            <div class="modal-content {{ config('adminlte.bg_modal') }}">
                <div class="modal-header">
                    <h4 class="modal-title"><span id="modal-title"> Form Tambah </span> {{ __('sidebar.merk') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ url('') }}" method="post" id="form-merk">
                    @csrf
                    <input type="hidden" name="id" id="merk_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Nama">
                                    <div class="invalid-feedback error-name"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-outline-light btn-submit">{{ __('general.simpan') }}</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@push('js')
    {{-- <script src="{{ asset('assets/js/merk.js') }}"></script> --}}
@endpush
