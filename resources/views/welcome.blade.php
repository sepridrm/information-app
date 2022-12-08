@extends('adminlte::master')

@section('body')
    <div class="wrapper p-3">
        <div class="row">
            <div class="col-lg-8 col-8">
                <div class="row mb-2">
                    <div class="col-lg-3 col-3 text-center">
                        <img class="img-fluid" src="vendor/adminlte/dist/img/AdminLTELogo.png">
                    </div>

                    <div class="col-lg-9 col-9 d-flex align-items-center">
                        <div>Admin LTE</div>
                    </div>
                </div>

                <marquee scrolldelay="100">
                    <h5>{{ $welcome->isi ?? 'Selamat Datang' }}</h5>
                </marquee>

                <video autoplay muted loop style="width: 100%">
                    <source src="{{ asset('storage') }}/{{ substr($video->path, 7) }}" type="video/mp4">
                </video>

                <div class="row mt-2">
                    <div class="col-lg-8 col-8 text-center">
                        <marquee scrolldelay="100">
                            <h5>{{ $pengumuman->isi ?? 'Pengumuman' }}</h5>
                        </marquee>
                    </div>

                    <div class="col-lg-4 col-4">
                        <div>
                            {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('l, d F Y') }}<span
                                id="jam" style="font-size:24"></span>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                window.onload = function() {
                    jam();
                }

                function jam() {
                    var e = document.getElementById('jam'),
                        d = new Date(),
                        h, m, s;
                    h = d.getHours();
                    m = set(d.getMinutes());
                    s = set(d.getSeconds());

                    e.innerHTML = ' | ' + h + ':' + m + ':' + s + ' WIB';

                    setTimeout('jam()', 1000);
                }

                function set(e) {
                    e = e < 10 ? '0' + e : e;
                    return e;
                }
            </script>

            <div class="col-lg-4 col-4">
                @if (Route::has('login'))
                    <div class="hidden mb-2 text-right">
                        @auth
                            <a href="{{ url('/home') }}">
                                <x-adminlte-button theme="dark" icon="fab fa-sm fa fa-home" />
                            </a>
                        @else
                            <a href="{{ route('login') }}">
                                <x-adminlte-button theme="dark" icon="fab fa-sm fa fa-user" />
                            </a>

                            {{-- @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                            @endif --}}
                    @endif
                </div>
                @endif

                <div id="carousel1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="img-fluid w-100" src="img/slide.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid w-100" src="img/slide.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid w-100" src="img/slide.png" alt="Third slide">
                        </div>
                    </div>
                </div>

                <div id="carousel1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="img-fluid w-100" src="img/slide.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid w-100" src="img/slide.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid w-100" src="img/slide.png" alt="Third slide">
                        </div>
                    </div>
                </div>


            </div>
        </div>

        </div>
    @stop

    {{-- Footer --}}
    @section('footer')
        @include('adminlte::partials.footer.footer')
    @stop
