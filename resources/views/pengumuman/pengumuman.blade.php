@extends('adminlte::page')

@section('title', 'Data Pengumuman')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Pengumuman</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        <button type="button" class="btn btn-success btn-sm btnTambah" id="create-item"
                            data-title="create">Tambah</button>
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
                                <th>Isi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->isi }}</td>
                                    <td>
                                        <a href="javascript:;"
                                            class="btn btn-sm btn-warning btn-round btn-icon d-inline-block"
                                            id="update-item" data-title="update" data-id="{{ $item->id }}"
                                            data-isi="{{ $item->isi }}" data-path="{{ substr($item->path, 14) }}"
                                            title="Edit"><i class="fas fa-edit"></i></a>

                                        @if ($item->aktif == 1)
                                            <a href="javascript:;" id="change-item" class="btn btn-sm btn-success"
                                                data-id="{{ $item->id }}" data-st="0" data-status="Tidak Aktif"
                                                data-nama="{{ $item->isi }}" data-title="Change data">
                                                Aktif
                                            </a>
                                        @else
                                            <a href="javascript:;" id="change-item" class="btn btn-sm btn-danger"
                                                data-id="{{ $item->id }}" data-st="1" data-status="Aktif"
                                                data-nama="{{ $item->isi }}" data-title="Change data">
                                                Tidak Aktif
                                            </a>
                                        @endif

                                        <a href="javascript:;" id="delete-item" class="btn btn-sm btn-danger"
                                            data-id="{{ $item->id }}" data-nama="{{ $item->isi }}"
                                            data-title="Delete data">
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
    @include('modals.change')
    @include('modals.delete')
    <!-- Modal -->
    <div class="modal fade" id="modal_cu">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span id="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form role="form" id="modalForm" name="modalForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" id="id" name="id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="isi">Isi</label>
                                    <input type="text" name="isi" class="form-control" id="isi"
                                        placeholder="Isi">
                                    <div class="invalid-feedback error-name"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <div></div>
                        <button id="btnsubmit" class="btn btn-primary">Simpan</button>
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
    <script src="{{ asset('js/modal-show-pengumuman.js') }}"></script>

    <!-- change -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnchange').click(function(e) {
                e.preventDefault();
                $(this).html('Proses Update..');
                $('#btnchange').attr("disabled", true);
                var form = $('#changeForm')[0];
                var formdata = new FormData(form);
                $.ajax({
                    processData: false,
                    contentType: false,
                    data: formdata,
                    url: "{{ route('change.status.pengumuman') }}",
                    type: "POST",
                    enctype: 'multipart/form-data',
                    dataType: 'json',
                    success: function(data) {
                        setTimeout(function() {
                            $('#modal-change').modal('hide');
                            location.replace("{{ route('pengumuman.index') }}")
                        }, 2200);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        jQuery('.alert-danger').hide();
                        setTimeout(function() {
                            $('#btnchange').html('Ubah');
                            $('#btnchange').attr("disabled", false);
                        }, 2200);
                    }
                });
            });
        });
    </script>

    <!-- delete -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btndelete').click(function(e) {
                e.preventDefault();
                $(this).html('Proses Delete..');
                $('#btndelete').attr("disabled", true);
                var form = $('#deleteForm')[0];
                var formdata = new FormData(form);
                $.ajax({
                    processData: false,
                    contentType: false,
                    data: formdata,
                    url: "{{ route('pengumuman.destroy') }}",
                    type: "POST",
                    enctype: 'multipart/form-data',
                    dataType: 'json',
                    success: function(data) {
                        setTimeout(function() {
                            $('#modal-delete').modal('hide');
                            location.replace("{{ route('pengumuman.index') }}")
                        }, 2200);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        jQuery('.alert-danger').hide();
                        setTimeout(function() {
                            $('#btndelete').html('Delete');
                            $('#btndelete').attr("disabled", false);
                        }, 2200);
                    }
                });
            });
        });
    </script>

    {{-- action --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnsubmit').click(function(e) {
                e.preventDefault();
                $('#btnsubmit').html('Proses Simpan..');
                $('#btnsubmit').attr("disabled", true);
                var form = $('#modalForm')[0];
                var formdata = new FormData(form);
                if ($("#modal_cu #id").val() == "") {
                    $.ajax({
                        processData: false,
                        contentType: false,
                        data: formdata,
                        url: "{{ route('pengumuman.store') }}",
                        type: "POST",
                        enctype: 'multipart/form-data',
                        dataType: 'json',
                        success: function(data) {
                            setTimeout(function() {
                                $('#modal_cu').modal('hide');
                                location.replace(
                                    "{{ route('pengumuman.index') }}"
                                )
                            }, 2200);
                        },
                        error: function(data) {
                            console.log('Error:', data);
                            jQuery('.alert-danger').hide();
                            setTimeout(function() {
                                $('#btnsubmit').html('Simpan');
                                $('#btnsubmit').attr("disabled",
                                    false);
                            }, 2200);
                        }
                    });
                } else {
                    let data = formdata;
                    data.append("_method", 'PATCH');
                    $.ajax({
                        processData: false,
                        contentType: false,
                        data: data,
                        url: "{{ route('pengumuman.update') }}",
                        type: "POST",
                        enctype: 'multipart/form-data',
                        dataType: 'json',
                        success: function(data) {
                            setTimeout(function() {
                                $('#modal_cu').modal('hide');
                                location.replace(
                                    "{{ route('pengumuman.index') }}"
                                )
                            }, 2200);
                        },
                        error: function(data) {
                            console.log('Error:', data);
                            jQuery('.alert-danger').hide();
                            setTimeout(function() {
                                $('#btnsubmit').html('Simpan');
                                $('#btnsubmit').attr("disabled",
                                    false);
                            }, 2200);
                        }
                    });
                }
            });
        });
    </script>
@endpush
