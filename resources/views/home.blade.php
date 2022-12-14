@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3 id="item-count">
                        {{ $pegawai }}
                    </h3>

                    <p>Jumlah pegawai</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3 id="supplier-count">
                        {{ $video }}
                    </h3>

                    <p>Video informasi aktif</p>
                </div>
                <div class="icon">
                    <i class="fas fa-video"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 id="customer-count">
                        {{ $image }}
                    </h3>
                    <p>Gambar informasi aktif</p>
                </div>
                <div class="icon">
                    <i class="fas fa-image"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3 id="salesperson-count">
                        {{ $pengumuman }}
                    </h3>

                    <p>Pengumuman aktif</p>
                </div>
                <div class="icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
        <!-- ./col -->
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop