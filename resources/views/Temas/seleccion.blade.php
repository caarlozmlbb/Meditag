@extends('layouts/layoutMaster')

@section('title', 'User List - Pages')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    <!-- Descripción introductoria -->
    <div class="mb-4 text-center">
        <h2 class="fw-bold">🧠🦴 Explora el Cuerpo Humano en 3D 🫀🫁</h2>
        <p class="text-muted">
            🧬 Sumérgete en el estudio anatómico con modelos interactivos en 3D del cuerpo humano, como el 🦴 esqueleto, 💀
            el cráneo y 🫀 los órganos internos.
        </p>
    </div>


    <!-- Tarjetas de contenido -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('assets/img/temas/esqueletos.jpg') }}" class="card-img-top" alt="Esqueleto Humano" />
                <div class="card-body">
                    <h3 class="card-title">Esqueleto Humano</h3>
                    <p class="card-text">Conoce cada hueso que compone el cuerpo humano y su función dentro del sistema
                        óseo.</p>
                    <a href="{{ route('vista_esqueleto') }}" class="btn btn-success w-100 mt-3 fw-bold"
                        style="background: linear-gradient(90deg, #38b000, #70e000); border: none;">
                        👁️ Ver modelo 3D
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="https://img.freepik.com/fotos-premium/holograma-brillante-sistema-oseo-craneo-humano-estructura-3d-fondo-oscuro_1255405-2928.jpg"
                    class="card-img-top" alt="El Cráneo" />
                <div class="card-body">
                    <h3 class="card-title">El Cráneo 💀</h3>
                    <p class="card-text">Explora la estructura del cráneo humano y cómo protege al cerebro.</p>
                    <a href="{{ route('vista_craneo') }}" class="btn btn-success w-100 mt-3 fw-bold"
                        style="background: linear-gradient(90deg, #38b000, #70e000); border: none;">
                        👁️ Ver modelo 3D
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="https://media.gettyimages.com/id/832718964/es/v%C3%ADdeo/esqueleto-de-la-radiograf%C3%ADa-de-humano-loopable-4k.jpg?s=640x640&k=20&c=HtQ7AufbCYw7_nZ2XznNEKx0d9T-kOgdPYgv1cgkcrc="
                    class="card-img-top" alt="Órganos Internos" />
                <div class="card-body">
                    <h3 class="card-title">Órganos Internos</h3>
                    <p class="card-text">Descubre el sistema de órganos humanos y su disposición dentro del cuerpo.</p>
                    <a href="{{ route('vista_organos_internos') }}" class="btn btn-success w-100 mt-3 fw-bold"
                        style="background: linear-gradient(90deg, #38b000, #70e000); border: none;">
                        👁️ Ver modelo 3D
                    </a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="https://dinorank.com/img/dinobrain/76041/imagen51351ba0d68f298a4b12780f17bd2600.jpg"
                    class="card-img-top" alt="Órganos Internos" />
                <div class="card-body">
                    <h3 class="card-title">El ojo Humano</h3>
                    <p class="card-text">Descubre el sistema de órganos humanos y su disposición dentro del cuerpo.</p>
                    <a href="{{ route('vista_ojo_humano') }}" class="btn btn-success w-100 mt-3 fw-bold"
                        style="background: linear-gradient(90deg, #38b000, #70e000); border: none;">
                        👁️ Ver modelo 3D
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
