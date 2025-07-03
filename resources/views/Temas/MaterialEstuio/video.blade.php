@extends('layouts/layoutMaster')

@section('title', 'Academy - My Course Details - App')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/plyr/plyr.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-academy-details.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/plyr/plyr.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-academy-course-details.js') }}"></script>
@endsection

@section('content')
    <h4 class="pt-3 mb-0">
        <span class="fw-light text-muted">Acádemia /</span> Estudia con un Video
    </h4>

    <div class="card g-3 mt-5">
        <div class="card-body row g-3">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
                    <div class="me-1">
                        <h5 class="mb-1">Huesos de Cráneo</h5>
                        <p class="mb-1">Armedi.<span class="fw-medium text-heading"> ¿Cuantos son? </span></p>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-label-danger rounded-pill">UI/UX</span>
                        {{-- <i class='mdi mdi-share-variant-outline mdi-24px mx-4'></i>
                        <i class='mdi mdi-bookmark-multiple-outline mdi-24px'></i> --}}
                    </div>
                </div>
                <div class="card academy-content shadow-none border">
                    <div class="p-2">
                        <div class="cursor-pointer"><video class="w-100"
                                poster="https://i.ytimg.com/vi/eWgl6Vdmy9A/maxresdefault.jpg" id="plyr-video-player"
                                playsinline controls>
                                <source src="{{ asset('assets/video/tema1/huesos.mp4') }}" type="video/mp4" />
                            </video>
                        </div>

                    </div>
                    <button class="btn btn-primary">Siguiente</button>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 rounded shadow-sm border border-2">
                    <h5 class="fw-bold mb-3 text-primary">🦴 Huesos del Cráneo</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <span class="fw-bold text-dark">💀 Número Total de Huesos Craneales:</span><br>
                            <span class="text-muted">El cráneo humano está compuesto por un total de ocho huesos,
                                clasificados en pares e impares.</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold text-dark">🧠 Hueso Frontal:</span><br>
                            <span class="text-muted">Impar, ubicado en la parte anterior del cráneo, formando la
                                frente.</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold text-dark">🦴 Huesos Parietales:</span><br>
                            <span class="text-muted">Dos huesos pares que forman la parte superior y lateral del
                                cráneo.</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold text-dark">🧠 Hueso Occipital:</span><br>
                            <span class="text-muted">Hueso impar situado en la parte posterior e inferior del cráneo con el
                                foramen magno.</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold text-dark">👂 Huesos Temporales:</span><br>
                            <span class="text-muted">Dos huesos pares que albergan las estructuras del oído.</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold text-dark">🦇 Hueso Esfenoides:</span><br>
                            <span class="text-muted">Hueso impar con forma de murciélago, ubicado en la base del
                                cráneo.</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold text-dark">👃 Hueso Etmoides:</span><br>
                            <span class="text-muted">Impar, situado en la base del cráneo, forma parte de la cavidad nasal y
                                las órbitas.</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection
