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
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool btnRefresh" title="Refresh table"><i class="fas fa-sync"></i></button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table-data" class="table table-striped table-bordered table-hover cell-border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Video</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
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
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama">
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
