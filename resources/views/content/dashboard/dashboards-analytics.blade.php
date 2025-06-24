@php
    $configData = Helper::appClasses();
@endphp
@extends('layouts/layoutMaster')

@section('title', 'Dashboard - Analytics')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-statistics.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-analytics.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
    <div class="row gy-4">
        <!-- Main Dashboard Content - Left Side -->
        <div class="col-xl-8">
            <div class="container-fluid px-4 py-4">
                <!-- Header -->
                <header class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <div class="position-relative me-3">
                            <div class="rounded-circle bg-success d-flex align-items-center justify-content-center text-white fw-bold fs-4"
                                style="width: 48px; height: 48px;">
                                T
                            </div>
                            <div class="streak-flame position-absolute bg-warning text-white rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                style="width: 24px; height: 24px; top: -8px; right: -8px; font-size: 10px;">
                                <i class="fas fa-fire"></i>
                            </div>
                        </div>
                        <div>
                            <h1 class="fs-5 fw-bold mb-0">Tu Camino</h1>
                            <p class="small text-muted mb-0">Día 7 de racha</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="bg-white p-2 rounded-circle shadow me-3 position-relative">
                            <i class="fas fa-gem text-purple"></i>
                            <span class="xp-bubble">150</span>
                        </div>
                        <div class="bg-white p-2 rounded-circle shadow position-relative">
                            <i class="fas fa-heart text-danger"></i>
                            <span class="ms-1 fw-medium">5</span>
                        </div>
                    </div>
                </header>

                <!-- Progress Section -->
                <section class="bg-white rounded shadow p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="fs-6 fw-semibold mb-0">Progreso diario</h2>
                        <span class="small text-muted">3/5 completados</span>
                    </div>
                    <div class="progress mb-2" style="height: 6px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="small text-muted mb-0">¡Solo 2 lecciones más para alcanzar tu objetivo diario!</p>
                </section>

                <!-- Path Container Vertical -->
                <div class="position-relative mb-5 d-flex justify-content-center">
                    <!-- Path Line Vertical -->


                    <div class="d-flex flex-column align-items-center gap-2">
                        <!-- Checkpoint -->
                        <div class="checkpoint mb-3">
                            <i class="fas fa-flag-checkered text-primary fs-4"></i>
                        </div>

                        <div class="d-flex flex-column align-items-center position-relative">
                            <a href="{{ route('leccion1') }}">
                                <img class="container-img" src="{{ asset('/assets/img/camino-serpiente/boton 1.png') }}"
                                    alt="" width="80">
                            </a>
                            <div class="crown position-absolute top-0 end-0 translate-middle bg-success p-1 rounded-circle">
                                <i class="fas fa-crown text-white" style="font-size: 10px;"></i>
                            </div>
                            <div
                                class="level-badge position-absolute bottom-0 start-50 translate-middle-x bg-white px-1 rounded-pill small">
                                Nivel 5</div>
                            <span class="small fw-medium mt-2">Básico</span>
                        </div>


                        <!-- Level Template -->
                        <div class="d-flex flex-column align-items-center position-relative" style="margin-left: -50px;">
                            <a href="">
                                <img class="container-img-lock"
                                    src="{{ asset('/assets/img/camino-serpiente/bloqueado.png') }}" alt=""
                                    width="80">
                            </a>
                            <div class="crown position-absolute top-0 end-0 translate-middle bg-success p-1 rounded-circle">
                                <i class="fas fa-crown text-white" style="font-size: 10px;"></i>
                            </div>
                            <div
                                class="level-badge position-absolute bottom-0 start-50 translate-middle-x bg-white px-1 rounded-pill small">
                                Nivel 5</div>

                            <span class="small fw-medium mt-2">Básico</span>
                        </div>

                        <div class="d-flex flex-column align-items-center position-relative" style="margin-left: 50px;">
                            <a href="">
                                <img src="{{ asset('/assets/img/camino-serpiente/bloqueado.png') }}" alt=""
                                    width="80">
                            </a>
                            <div class="crown position-absolute top-0 end-0 translate-middle bg-success p-1 rounded-circle">
                                <i class="fas fa-crown text-white" style="font-size: 10px;"></i>
                            </div>
                            <div
                                class="level-badge position-absolute bottom-0 start-50 translate-middle-x bg-white px-1 rounded-pill small">
                                Nivel 5</div>

                            <span class="small fw-medium mt-2">Básico</span>
                        </div>


                        <div class="d-flex flex-column align-items-center position-relative" style="margin-left: -40px;">
                            <a href="">
                                <img src="{{ asset('/assets/img/camino-serpiente/bloqueado.png') }}" alt=""
                                    width="80">
                            </a>
                            <div class="crown position-absolute top-0 end-0 translate-middle bg-success p-1 rounded-circle">
                                <i class="fas fa-crown text-white" style="font-size: 10px;"></i>
                            </div>
                            <div
                                class="level-badge position-absolute bottom-0 start-50 translate-middle-x bg-white px-1 rounded-pill small">
                                Nivel 5</div>

                            <span class="small fw-medium mt-2">Básico</span>
                        </div>


                        <div class="d-flex flex-column align-items-center position-relative" style="margin-left: 50px;">
                            <a href="">
                                <img src="{{ asset('/assets/img/camino-serpiente/bloqueado.png') }}" alt=""
                                    width="80">
                            </a>
                            <div
                                class="crown position-absolute top-0 end-0 translate-middle bg-success p-1 rounded-circle">
                                <i class="fas fa-crown text-white" style="font-size: 10px;"></i>
                            </div>
                            <div
                                class="level-badge position-absolute bottom-0 start-50 translate-middle-x bg-white px-1 rounded-pill small">
                                Nivel 5</div>

                            <span class="small fw-medium mt-2">Básico</span>
                        </div>



                        <div class="d-flex flex-column align-items-center position-relative">
                            <div class="lesson-card position-relative rounded-circle border border-3 border-secondary d-flex align-items-center justify-content-center"
                                style="width: 64px; height: 64px; background-color: #f8f9fa;">
                                <i class="fas fa-lock text-secondary fs-4"></i>
                                <div
                                    class="level-badge position-absolute bottom-0 start-50 translate-middle-x bg-white px-1 rounded-pill small">
                                    Nivel 1</div>
                            </div>
                            <span class="small fw-medium text-muted mt-2">Ciudad</span>
                        </div>
                    </div>
                </div>

                <!-- Current Lesson -->
                <section class="bg-white rounded shadow p-4 mb-4">
                    <h2 class="fs-6 fw-semibold mb-3">Lección actual: Comida</h2>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="p-3 rounded border"
                                style="background-color: #f0f9ff; border-color: #bae6fd !important;">
                                <h3 class="fw-medium mb-2" style="color: #0c4a6e;">Palabras nuevas</h3>
                                <ul class="list-unstyled small mb-0">
                                    <li class="d-flex align-items-center mb-1">
                                        <span class="rounded-circle me-2"
                                            style="width: 16px; height: 16px; background-color: #bae6fd;"></span>
                                        <span>Manzana</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-1">
                                        <span class="rounded-circle me-2"
                                            style="width: 16px; height: 16px; background-color: #bae6fd;"></span>
                                        <span>Pan</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-1">
                                        <span class="rounded-circle me-2"
                                            style="width: 16px; height: 16px; background-color: #bae6fd;"></span>
                                        <span>Agua</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-1">
                                        <span class="rounded-circle me-2"
                                            style="width: 16px; height: 16px; background-color: #bae6fd;"></span>
                                        <span>Leche</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 rounded border"
                                style="background-color: #ecfdf5; border-color: #bbf7d0 !important;">
                                <h3 class="fw-medium mb-2" style="color: #14532d;">Frases clave</h3>
                                <ul class="list-unstyled small mb-0">
                                    <li class="d-flex align-items-center mb-1">
                                        <span class="rounded-circle me-2"
                                            style="width: 16px; height: 16px; background-color: #bbf7d0;"></span>
                                        <span>Quiero comer</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-1">
                                        <span class="rounded-circle me-2"
                                            style="width: 16px; height: 16px; background-color: #bbf7d0;"></span>
                                        <span>Tengo hambre</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-1">
                                        <span class="rounded-circle me-2"
                                            style="width: 16px; height: 16px; background-color: #bbf7d0;"></span>
                                        <span>¿Qué hay para comer?</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <button id="startLesson" class="btn btn-success w-100 fw-bold py-2 start-lesson-btn">
                        <i class="fas fa-play me-2"></i>
                        <span>Comenzar lección</span>
                    </button>
                </section>

                <!-- Daily Streak -->
                <section class="rounded shadow p-4 text-white streak-gradient">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="fs-6 fw-semibold mb-1">Racha diaria</h2>
                            <p class="small mb-0" style="opacity: 0.9;">7 días seguidos</p>
                        </div>
                        <div class="fs-1">
                            <i class="fas fa-fire streak-flame"></i>
                        </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-between">
                        <div class="text-center">
                            <div
                                class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-1 streak-day">
                                <i class="fas fa-check" style="font-size: 10px;"></i>
                            </div>
                            <span style="font-size: 11px;">Lun</span>
                        </div>
                        <div class="text-center">
                            <div
                                class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-1 streak-day">
                                <i class="fas fa-check" style="font-size: 10px;"></i>
                            </div>
                            <span style="font-size: 11px;">Mar</span>
                        </div>
                        <div class="text-center">
                            <div
                                class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-1 streak-day">
                                <i class="fas fa-check" style="font-size: 10px;"></i>
                            </div>
                            <span style="font-size: 11px;">Mié</span>
                        </div>
                        <div class="text-center">
                            <div
                                class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-1 streak-day">
                                <i class="fas fa-check" style="font-size: 10px;"></i>
                            </div>
                            <span style="font-size: 11px;">Jue</span>
                        </div>
                        <div class="text-center">
                            <div
                                class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-1 streak-day">
                                <i class="fas fa-check" style="font-size: 10px;"></i>
                            </div>
                            <span style="font-size: 11px;">Vie</span>
                        </div>
                        <div class="text-center">
                            <div
                                class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-1 streak-day">
                                <i class="fas fa-check" style="font-size: 10px;"></i>
                            </div>
                            <span style="font-size: 11px;">Sáb</span>
                        </div>
                        <div class="text-center">
                            <div class="rounded-circle bg-warning d-flex align-items-center justify-content-center mx-auto mb-1"
                                style="width: 32px; height: 32px;">
                                <i class="fas fa-bolt text-white" style="font-size: 10px;"></i>
                            </div>
                            <span style="font-size: 11px;">Hoy</span>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- Right Side Cards -->
        <div class="col-xl-4">
            <div class="d-flex flex-column gap-4">
                <!-- Card 1 - Felicitaciones -->
                <div class="card">
                    <div class="card-body text-nowrap">
                        <h4 class="card-title mb-1 d-flex gap-2 flex-wrap">Felicidades {{ auth()->user()->name }}! 🎉</h4>
                        <p class="pb-0">Best seller of the month</p>
                        <h4 class="text-primary mb-1">$42.8k</h4>
                        <p class="mb-2 pb-1">78% of target 🚀</p>
                        <a href="javascript:;" class="btn btn-sm btn-primary">View Sales</a>
                    </div>
                    <img src="{{ asset('assets/img/illustrations/trophy.png') }}"
                        class="position-absolute bottom-0 end-0 me-3" height="140" alt="view sales">
                </div>

                <!-- Card 2 - Contenedor vacío -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contenedor 2</h5>
                        <model-viewer src="{{ asset('assets/models3D/personaje/repo.glb') }}"
                            alt="🧠 Modelo 3D del Cráneo en Movimiento" auto-rotate autoplay camera-controls
                            exposure="0.6" environment-image="neutral" shadow-intensity="0.8"
                            style="width: 100%; height: 350px; background-color: #f9f9f9;">
                        </model-viewer>

                        <p class="card-text">Este es el segundo contenedor vacío que puedes personalizar según tus
                            necesidades.</p>
                        <!-- Aquí puedes agregar el contenido que necesites -->
                    </div>
                </div>

                <!-- Card 3 - Contenedor vacío -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contenedor 3</h5>
                        <p class="card-text">Este es el tercer contenedor vacío listo para que agregues tu contenido
                            personalizado.</p>
                        <!-- Aquí puedes agregar el contenido que necesites -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Navigation -->
        <nav class="fixed-bottom bg-black shadow">
            <div class="container-fluid px-4">
                <div class="d-flex justify-content-around">
                    <a href="#" class="py-3 px-4 text-success text-decoration-none">
                        <i class="fas fa-home fs-5"></i>
                    </a>
                    <a href="#" class="py-3 px-4 text-muted text-decoration-none">
                        <i class="fas fa-book fs-5"></i>
                    </a>
                    <a href="#" class="py-3 px-4 text-muted text-decoration-none">
                        <i class="fas fa-comments fs-5"></i>
                    </a>
                    <a href="#" class="py-3 px-4 text-muted text-decoration-none">
                        <i class="fas fa-user fs-5"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    {{-- Actividad desbloqueada --}}
    <style>
        .container-img {
            animation: glowPulse 2s infinite ease-in-out;
            border-radius: 50%;
            /* opcional si quieres que el brillo sea redondo */
        }

        @keyframes glowPulse {
            0% {
                box-shadow: 0 0 5px rgba(81, 229, 45, 0.5),
                    0 0 10px rgba(41, 222, 13, 0.4),
                    0 0 15px rgba(28, 250, 98, 0.3);
            }

            50% {
                box-shadow: 0 0 20px rgba(255, 255, 0, 0.8),
                    0 0 30px rgba(255, 255, 0, 0.6),
                    0 0 40px rgba(255, 255, 0, 0.5);
            }

            100% {
                box-shadow: 0 0 5px rgba(255, 255, 0, 0.5),
                    0 0 10px rgba(255, 255, 0, 0.4),
                    0 0 15px rgba(255, 255, 0, 0.3);
            }
        }
    </style>

    {{-- Actividad bloqueada --}}

    <style>
        .container-img-lock {
            animation: glowPulse 2s infinite ease-in-out;
            border-radius: 50%;
            /* opcional si quieres que el brillo sea redondo */
        }
    </style>





    <style>
        .path-container {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .path-container::-webkit-scrollbar {
            display: none;
        }

        .lesson-card {
            transition: all 0.3s ease;
            transform-origin: center;
        }

        .lesson-card:hover {
            transform: scale(1.05) !important;
        }

        .crown {
            position: absolute;
            top: -12px;
            right: -8px;
            background-color: #ffcc4d;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .streak-flame {
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .path-line {
            background: linear-gradient(to bottom, #198754, #0d6efd);
        }

        .level-badge {
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #0d6efd;
            color: white;
            border-radius: 12px;
            padding: 2px 8px;
            font-size: 10px;
            font-weight: bold;
            white-space: nowrap;
        }

        .checkpoint {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: -20px;
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 50%;
            border: 4px solid #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .xp-bubble {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #ffcc4d;
            color: #8a5a0b;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: bold;
        }

        .heart {
            position: absolute;
            top: -8px;
            left: -8px;
            color: #dc3545;
            font-size: 16px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .bounce-animation {
            animation: bounce 0.8s infinite;
        }

        .glow {
            box-shadow: 0 0 15px rgba(25, 135, 84, 0.6);
        }

        .streak-gradient {
            background: linear-gradient(135deg, #0d6efd, #6f42c1);
        }

        .streak-day {
            width: 32px;
            height: 32px;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .start-lesson-btn {
            transition: all 0.3s ease;
        }

        .start-lesson-btn:hover {
            transform: scale(1.05);
        }

        .text-purple {
            color: #6f42c1 !important;
        }
    </style>
@endsection
