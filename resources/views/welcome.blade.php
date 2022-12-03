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
                    <h5>Selamat datang</h5>
                </marquee>

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

                <div class="row mt-2">
                    <div class="col-lg-9 col-9 text-center">
                        <marquee scrolldelay="100">
                            <h5>Et et sit anim id enim excepteur tempor sunt ad sint esse. Elit nostrud aliqua reprehenderit consequat aute.</h5>
                        </marquee>
                    </div>

                    <div class="col-lg-3 col-3">
                        <div>30 Desember 2022</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-4">
                @if (Route::has('login'))
                    <div class="hidden mb-2 text-right">
                        @auth
                            <a href="{{ url('/home') }}"><x-adminlte-button theme="dark" icon="fab fa-sm fa fa-home"/></a>
                        @else
                            <a href="{{ route('login') }}"><x-adminlte-button theme="dark" icon="fab fa-sm fa fa-user"/></a>

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