@extends('layouts/layoutMaster')

@section('title', 'User List - Pages')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />

@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-user-list.js') }}"></script>
@endsection

@section('content')
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

    {{-- <img src="{{ asset('assets/img/temas/adriano/adriano.jpg') }}" alt="adriano" width="500px"> --}}
    {{-- <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
        <model-viewer src="{{ asset('assets/models3D/ojo_glb.glb') }}" alt="Modelo 3D" auto-rotate camera-controls
            exposure="0.6" environment-image="neutral" shadow-intensity="0.8"
            style="width: 100%; height: 400px; margin: 0 auto; background-color: transparent;">
        </model-viewer>
    </div> --}}

    {{-- FONFO DE FOTO --}}
    {{-- <div class="sm:w-1/2 xl:w-3/5 h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative"
        style="background-image: url(https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Portrait_of_Pope_Adrian_VI_%28after_Jan_van_Scorel%29.jpg/960px-Portrait_of_Pope_Adrian_VI_%28after_Jan_van_Scorel%29.jpg);">

        <!-- Degradado superpuesto -->
        <div class="absolute inset-0 bg-gradient-to-b from-green-600 to-lime-500 opacity-75 z-0"></div>

        <!-- Contenido centrado, por encima -->
        <div class="w-full max-w-md z-10 relative flex flex-col items-center">

            <div class="sm:text-4xl xl:text-5xl font-bold leading-tight mb-6 text-center">
                Explora el aprendizaje con Realidad Aumentada.
            </div>

            <!-- Modelo 3D encima, tamaño controlado -->
            <model-viewer src="{{ asset('assets/models3D/craneoMovimiento.glb') }}" alt="Modelo 3D" auto-rotate
                camera-controls exposure="0.6" environment-image="neutral" shadow-intensity="0.8"
                style="width: 100%; height: 300px; background-color: transparent;">
            </model-viewer>

            <div class="sm:text-sm xl:text-md text-gray-200 font-normal mt-4 text-center">
                ----
            </div>
        </div>
    </div> --}}

    <div class="relative inline-block">
        <!-- Imagen base con su tamaño natural -->
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Portrait_of_Pope_Adrian_VI_%28after_Jan_van_Scorel%29.jpg/960px-Portrait_of_Pope_Adrian_VI_%28after_Jan_van_Scorel%29.jpg"
            alt="Pope Adrian VI" class="block w-full h-auto" />

        <!-- Modelo 3D superpuesto sobre la imagen -->
        <model-viewer src="{{ asset('assets/models3D/craneoMovimiento.glb') }}" alt="Modelo 3D" auto-rotate camera-controls
            exposure="0.6" environment-image="neutral" shadow-intensity="0.8" class="absolute z-10"
            style="top: 100%; left: 40%; transform: translate(-50%, -50%);
               width: 200px; height: 200px; background-color: transparent;">
        </model-viewer>

        <!-- Texto centrado sobre la imagen -->
        <div class="absolute inset-0 flex flex-col justify-end items-center text-white z-20 p-6 text-center">
            <h2 class="text-3xl md:text-5xl font-bold mb-4">Explora el aprendizaje con Realidad Aumentada</h2>
            <p class="text-sm text-gray-100">Con tecnologías emergentes e interactivas</p>
        </div>
    </div>



    {{-- <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
        <model-viewer src="{{ asset('assets/models3D/esqueleto.glb') }}" alt="Modelo 3D Esqueleto" auto-rotate
            camera-controls exposure="0.6" environment-image="neutral" shadow-intensity="0.8"
            style="width: 100%; height: 500px; background-color: #111;" ar interaction-prompt="none">

            <!-- Hotspot 1 -->
            <button class="hotspot" slot="hotspot-1" data-position="0m 1.5m 0m" data-normal="0m 1m 0m"
                data-visibility-attribute="visible">
                <div class="marker">1</div>
            </button>

        </model-viewer>

    </div>
    <style>
        .hotspot {
            all: unset;
            display: block;
            width: 24px;
            height: 24px;
            cursor: pointer;
            position: relative;
        }

        .marker {
            background-color: white;
            color: black;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }
    </style> --}}

@endsection
