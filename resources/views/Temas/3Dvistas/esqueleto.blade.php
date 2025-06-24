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
    <!-- Model Viewer CDN -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <div class="text-center my-5">
        <h2 class="fw-bold" style="font-size: 2rem;">
            🔍 Exploración Interactiva del Ojo Humano en 3D
        </h2>
        <p class="text-muted mt-2" style="max-width: 700px; margin: 0 auto;">
            Descubre la anatomía ocular desde todos los ángulos con este modelo 3D interactivo. ¡Gira, amplía y explora al
            detalle!
        </p>
    </div>

    <!-- Contenedor principal -->
    <div class="container my-4">
        <div class="rounded border p-3 shadow-sm bg-white">
            <!-- Visor del modelo 3D -->
            <model-viewer src="{{ asset('assets/models3D/skeleton.glb') }}" alt="👁️ Modelo 3D del Ojo Humano" auto-rotate
                camera-controls exposure="0.6" environment-image="neutral" shadow-intensity="0.8"
                style="width: 100%; height: 350px; background-color: #f9f9f9;">
            </model-viewer>

            <!-- Descripción de los hotspots -->
            <div id="descripcion-hotspot" class="mt-3 p-3 rounded-3 shadow-sm text-dark"
                style="min-height: 80px; background: linear-gradient(90deg, #e0f7fa, #e1f5fe); border-left: 5px solid #03a9f4;">
                👆 Haz clic en un marcador para ver la descripción del modelo.
            </div>
        </div>
    </div>

@endsection
