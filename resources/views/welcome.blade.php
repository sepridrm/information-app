@extends('adminlte::master')

@section('title', 'BPKAD Muara Enim')

@section('body')
    <div class="wrapper bg-white d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-lg-8 col-8 d-flex flex-column">

                <div class="row" style="height: 10%">
                    <div class="col-lg-1 col-1 d-flex align-items-center justify-content-center">
                        <img class="img-fluid" src="vendor/adminlte/dist/img/merinem.png" style="width: 55px; height: 55px;">
                    </div>

                    <div class="col-lg-11 col-11 d-flex align-items-center justify-content-center pr-0">
                        <div class="row">
                            <div class="col-lg-3 col-3">
                                <h4 class="mb-0">BPKAD Muara Enim</h4>
                            </div>
                            <div class="col-lg-9 col-9">
                                <marquee>
                                    <h4 class="mb-0">
                                        Jadwal sholat hari ini {{ $schedule['tanggal'] }} untuk wilayah Kab. Muara Enim, <strong>Subuh: {{ $schedule['subuh'] }} WIB</strong> | <strong>Dzuhur: {{ $schedule['dzuhur'] }} WIB</strong> | <strong>Ashar: {{ $schedule['ashar'] }} WIB</strong> | <strong>Magrib: {{ $schedule['maghrib'] }} WIB</strong> | <strong>Isya: {{ $schedule['isya'] }} WIB</strong>
                                    </h4>
                                </marquee>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-flex align-items-center justify-content-center bg-info" style="height: 8%">
                    <marquee scrolldelay="100">
                        <h4 class="mb-0">{{ $welcome->isi ?? 'Selamat Datang' }}</h4>
                    </marquee>
                </div>

                <div class="row" style="height: 80%">
                    @if (!$video->count() == 0)
                        <video id="videoInformasi" style="width: 100%; height: 100%; margin: 0">
                            {{-- <source src="{{ asset('storage') }}{{ substr($video[1]->path, 6) }}" type="video/mp4"> --}}
                        </video>
                    @endif
                </div>

                <div class="row" style="height: 10%">
                    <div class="col-lg-4 col-4 d-flex flex-column align-items-center justify-content-center bg-warning">
                            <h4 class="mb-0">{{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('l, d F Y') }}</h4>
                            <h4 class="mb-0" id="jam"></h4>
                    </div>
                    <div class="col-lg-8 col-8 d-flex align-items-center justify-content-center bg-success">
                        <div class="carousel slide" data-ride="carousel" data-interval="4000">
                            <div class="carousel-inner px-2">
                                @foreach ($pengumuman as $item)
                                    @if($loop->index == 0)
                                        <div class="carousel-item active">
                                            <h4 class="mb-0 text-center">{{ $item->isi }}</h4>
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <h4 class="mb-0 text-center">{{ $item->isi }}</h4>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-4">
                <div class="row pl-1 mb-1">
                    <div class="carousel slide bg-secondary" data-ride="carousel" data-interval="3000">
                        <h4 class="text-center mt-3">Pegawai BPKAD Muara Enim</h4>
                        <div class="carousel-inner" style="height: 47.5vh">
                            @foreach ($pegawai as $item)
                                    @if($loop->index == 0)
                                        <div class="carousel-item active">
                                            <div class="d-flex flex-column align-items-center py-3">
                                                @if ($item->foto != '')
                                                    <img class="border rounded" width="45%" height="45%"
                                                    src="{{ asset('storage') }}/{{ substr($item->foto, 7) }}" />
                                                @else
                                                    <img class="border rounded" width="45%" height="45%" src="{{ asset('img/default.jpg') }}" />
                                                @endif
                                                <h4 class="mb-0 mt-1">{{ $item->nama }}</h4>
                                                <h5 class="mb-0">{{ $item->jabatan }} ({{ $item->pangkat_pegawai->pangkat->nama }} {{ $item->pangkat_pegawai->pangkat->golongan }})</h5>
                                            </div>
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <div class="d-flex flex-column align-items-center py-3">
                                                @if ($item->foto != '')
                                                    <img class="border rounded" width="45%" height="45%"
                                                    src="{{ asset('storage') }}/{{ substr($item->foto, 7) }}" />
                                                @else
                                                    <img class="border rounded" width="45%" height="45%" src="{{ asset('img/default.jpg') }}" />
                                                @endif
                                                <h4 class="mb-0 mt-1">{{ $item->nama }}</h4>
                                                <h5 class="mb-0">{{ $item->jabatan }} ({{ $item->pangkat_pegawai->pangkat->nama }} {{ $item->pangkat_pegawai->pangkat->golongan }})</h5>
                                            </div>
                                        </div>
                                    @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row pl-1 mt-1">
                    <div class="carousel slide" data-ride="carousel" data-interval="5000" style="overflow: hidden">
                        <div class="carousel-inner" style="height: 47.5vh">
                            @foreach ($image as $item)
                                @if($loop->index == 0)
                                    <div class="carousel-item active">
                                        <img style="width: 100%; height: 100%;" src="{{ asset('storage') }}{{ substr($item->path, 6) }}">
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img style="width: 100%; height: 100%;" src="{{ asset('storage') }}{{ substr($item->path, 6) }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                @if (Route::has('login'))
                    <div class="hidden" style="position: absolute; top: 7px; right: 15px;">
                        <x-adminlte-button theme="dark" icon="fab fa-sm fa fa-arrows-alt" onclick="openFullscreen();" />
                        <a href="{{ url('/home') }}">
                            <x-adminlte-button theme="dark" icon="fab fa-sm fa fa-user" />
                        </a>
                    </div>
                @endif
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