@extends('adminlte::master')

@section('title', 'BPKAD Muara Enim')

@section('body')
    <div class="wrapper bg-white d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-lg-8 col-8 pt-1">
                <div class="row">
                    <div class="col-lg-1 col-1 text-center">
                        <img class="img-fluid" src="vendor/adminlte/dist/img/merinem.png" style="width: 55px; height: 55px;">
                    </div>

                    <div class="col-lg-11 col-11 d-flex align-items-center">
                        <div class="row">
                            <div class="col-lg-3 col-3">
                                <h4 class="mb-0">BPKAD Muara Enim</h4>
                            </div>
                            <div class="col-lg-9 col-9 px-0">
                                <marquee class="mb-0">
                                    Jadwal sholat hari ini {{ $schedule['tanggal'] }} untuk wilayah Kab. Muara Enim, <strong>Subuh: {{ $schedule['subuh'] }} WIB</strong> | <strong>Dzuhur: {{ $schedule['dzuhur'] }} WIB</strong> | <strong>Ashar: {{ $schedule['ashar'] }} WIB</strong> | <strong>Magrib: {{ $schedule['maghrib'] }} WIB</strong> | <strong>Isya: {{ $schedule['isya'] }} WIB</strong>
                                </marquee>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <marquee scrolldelay="100" class="d-flex bg-info p-2">
                        <h5 class="mb-0">{{ $welcome->isi ?? 'Selamat Datang' }}</h5>
                    </marquee>
                </div>

                <div class="row">
                    @if (!$video->count() == 0)
                        <video id="videoInformasi" style="width: 100%; margin: 0">
                            <source src="{{ asset('storage') }}{{ substr($video[1]->path, 6) }}" type="video/mp4">
                        </video>
                    @endif
                </div>

                <div class="row">
                    <div class="col-lg-4 col-4 d-flex flex-column align-items-center justify-content-center bg-warning">
                            {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('l, d F Y') }}<span
                                id="jam" style="font-size:24"></span>
                    </div>
                    <div class="col-lg-8 col-8 text-center bg-success py-3 px-0">
                        <div class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner px-2">
                                @foreach ($pengumuman as $item)
                                    @if($loop->index == 0)
                                        <div class="carousel-item active">
                                            <h5 class="mb-0">{{ $item->isi }}</h5>
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <h5 class="mb-0">{{ $item->isi }}</h5>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-4">
                @if (Route::has('login'))
                    <div class="hidden m-2 text-right" >
                        <x-adminlte-button theme="dark" icon="fab fa-sm fa fa-arrows-alt" onclick="openFullscreen();" />
                        <a href="{{ url('/home') }}">
                            <x-adminlte-button theme="dark" icon="fab fa-sm fa fa-user" />
                        </a>
                    </div>
                @endif

                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="img-fluid w-100" src="img/slide1.jpeg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid w-100" src="img/slide1.jpeg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid w-100" src="img/slide1.jpeg" alt="Third slide">
                        </div>
                    </div>
                </div>

                <div class="carousel slide mt-2" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($image as $item)
                            @if($loop->index == 0)
                                <div class="carousel-item active">
                                    <img class="img-fluid w-100" src="{{ asset('storage') }}{{ substr($item->path, 6) }}">
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img class="img-fluid w-100" src="{{ asset('storage') }}{{ substr($item->path, 6) }}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="notifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title text-center mb-2" id="notifTitle"></h5>
                <video id="notifVideo" style="width: 100%; margin: 0">
                    <source src="{{ asset('video') }}/adzan.mov" type="video/mp4">
                </video>
            </div>
          </div>
        </div>
    </div>

    <script type="text/javascript">
        var videoInformasi = document.getElementById("videoInformasi");
        var notifVideo = document.getElementById("notifVideo");

        var videos = {!! json_encode($video) !!};
        var videoUrl = {!! json_encode(asset('storage')) !!};
        var videoActive = 0;

        var schedule = {!! json_encode($schedule) !!};
        delete schedule.tanggal;
        delete schedule.imsak;
        delete schedule.terbit;
        delete schedule.dhuha;
        var arrSchedule = [];
        for (var key in schedule) {
            var temp = {
                nama: key[0].toUpperCase() + key.slice(1),
                jam: schedule[key] + ":00",
                // jam: key === "dzuhur" ? "12:36:20" : schedule[key] + ":00"
            }
            arrSchedule.push(temp)
        }
        var jam

        window.onload = function() {
            setJam();
            onHideNotif();
            playVideo(videoUrl+videos[videoActive].path.substring(6));
        }

        function setJam() {
            var e = document.getElementById('jam'),
                d = new Date(),
                h, m, s;
            h = set(d.getHours());
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            e.innerHTML =  h + ':' + m + ':' + s + ' WIB';

            jam = h + ':' + m + ':' + s

            var adzan = arrSchedule.find((el) => { return el.jam === jam; });
            if(adzan)
                showNotif("Saatnya adzan "+ adzan.nama);

            setTimeout('setJam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }

        notifVideo.addEventListener('ended',function(e){
            $('#notifModal').modal('hide');
        });

        videoInformasi.addEventListener('ended',function(e){
            videoActive++;
            if(videoActive > videos.length-1)
                videoActive=0
            playVideo(videoUrl+videos[videoActive].path.substring(6));
        });

        document.addEventListener('keydown', function(e){
            if(e.key === "Escape")
                $(".hidden").show()
        })

        function playVideo(url) {
            videoInformasi.src = url;
            videoInformasi.play();
        }

        function showNotif(title = null){
            $("#notifModal").modal()
            $("#notifTitle").text(title)
            videoInformasi.pause()
            notifVideo.play()
        }

        function onHideNotif(){
            $('#notifModal').on('hidden.bs.modal', function () {
                notifVideo.pause()
                videoInformasi.play()
            });
        }

        function openFullscreen() {
            var elem = document.getElementsByTagName("BODY")[0];
            $(".hidden").hide()
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) { /* Safari */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE11 */
                elem.msRequestFullscreen();
            }
        }
    </script>
@stop

{{-- Footer --}}
@section('footer')
    @include('adminlte::partials.footer.footer')
@stop