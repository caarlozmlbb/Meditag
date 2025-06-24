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

    <!-- Contenedor del visor 3D con borde estilizado -->
    <div class="rounded-4 p-3 shadow-lg"
        style="border: 4px solid; border-image: linear-gradient(45deg, #0f0, #0c6) 1; background: #111;">
        <model-viewer id="modelo3d" src="{{ asset('assets/models3D/esqueleto.glb') }}" alt="🦴 Modelo 3D del Esqueleto"
            auto-rotate camera-controls exposure="0.6" environment-image="neutral" shadow-intensity="0.8"
            style="width: 100%; height: 500px; background-color: #111;" ar interaction-prompt="none">

            <!-- Hotspot 1 -->
            <button type="button" class="hotspot" slot="hotspot-1" data-position="0m 60m 0m" data-normal="0m 1m 0m"
                data-visibility-attribute="visible" data-description="💀 Este es el cráneo humano. Protege el cerebro.">
                <div class="marker">1</div>
            </button>

            <!-- Hotspot 2 -->
            <button type="button" class="hotspot" slot="hotspot-2" data-position="0m -10m 0m" data-normal="0m 1m 0m"
                data-visibility-attribute="visible"
                data-description="🫁 Esta es la cavidad torácica. Contiene órganos vitales como el corazón y los pulmones.">
                <div class="marker">2</div>
            </button>
        </model-viewer>

        <!-- Descripción dinámica -->
        <div id="descripcion-hotspot" class="mt-3 p-3 rounded-3 shadow-sm text-light"
            style="min-height: 80px; background: linear-gradient(90deg, #222, #333); border-left: 5px solid #0f0;">
            👆 Haz clic en un marcador para ver la descripción.
        </div>
    </div>

    <!-- Script para controlar los hotspots -->
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const modelViewer = document.getElementById('modelo3d');
            const botones = modelViewer.querySelectorAll('.hotspot');

            botones.forEach(btn => {
                btn.addEventListener('click', () => {
                    const descripcion = btn.getAttribute('data-description');
                    document.getElementById('descripcion-hotspot').textContent = descripcion;

                    // Mover la cámara
                    const posicion = btn.getAttribute('data-position');
                    modelViewer.cameraTarget = posicion;
                    modelViewer.cameraOrbit = '0deg 90deg 2m';
                });
            });
        });
    </script>

    <!-- Estilos para los hotspots -->
    <style>
        .hotspot {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 50%;
            padding: 0.25rem;
            transition: transform 0.2s ease;
        }

        .hotspot:hover {
            transform: scale(1.2);
        }

        .marker {
            background-color: #0f0;
            color: #000;
            border-radius: 50%;
            width: 26px;
            height: 26px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            box-shadow: 0 0 8px #0f0;
        }
    </style>



@endsection
