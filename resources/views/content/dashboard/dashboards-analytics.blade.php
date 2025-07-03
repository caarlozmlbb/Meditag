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
    <link rel="stylesheet" href="{{ asset('assets/css/camino.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-email.css') }}" />
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
                    <button id="boton-select"class="btn btn-success w-100 fw-bold py-2 start-lesson-btn">
                        <i class="fas fa-play me-2"></i>
                    </button>


                    <p class="small text-muted mb-0">¡Solo 2 lecciones más para alcanzar tu objetivo diario!</p>
                </section>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                <style>
                    .hover-bg-light:hover {
                        background-color: #e0e2ff !important;
                        cursor: pointer;
                    }
                </style>
                <script>
                    function cargarMaterial(id) {
                        $.ajax({
                            url: `/materiales/${id}`,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                let html = '';

                                // 👇 Nuevo cálculo de progreso
                                let total = data.length;
                                let completados = data.filter(m => m.estado === 'completado').length;
                                let porcentaje = total === 0 ? 0 : Math.round((completados / total) * 100);


                                // Actualizar barra y texto de progreso
                                $('#barra-progreso').css('width', `${porcentaje}%`);
                                $('#texto-progreso').text(`${porcentaje}%`);

                                $('#boton-select').html(`Comenzar leccion: ${id}`);
                                $('#resultado').html(html);
                                data.forEach(function(material) {
                                    let estadoTexto = material.estado === 'completado' ? 'Completado' :
                                        'Incompleto';
                                    let estadoClase = material.estado === 'completado' ? 'text-success' :
                                        'text-warning';
                                    let iconoEstado = material.estado === 'completado' ? 'fas fa-check' :
                                        'fas fa-times-circle';
                                    let bgClase = material.estado === 'completado' ?
                                        'hover-bg-light' : 'hover-bg-light';
                                    let iconBg = material.estado === 'completado' ? 'bg-primary' : 'bg-secondary';

                                    let rutaHref = `/${material.nombre}_${id}_tema1`;

                                    html += `
                                    <li class="mb-2 p-3 rounded-3 ${bgClase}" data-target="inbox">
                                        <a href="${rutaHref}" class="d-flex align-items-center text-decoration-none">
                                            <div class="icon-wrapper ${iconBg} text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                                style="width: 35px; height: 35px;">
                                                <i class="${iconoEstado}"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold text-dark">
                                                    ${material.descripcion ?? '---'}
                                                </span>
                                                <div class="small text-muted">Tiempo: ${material.tiempo ?? '--:--:--'}</div>
                                            </div>
                                            <div class="d-flex align-items-center ${estadoClase} ms-auto">
                                                <span class="me-1 small fw-semibold">${estadoTexto}</span>
                                                <i class="${iconoEstado}"></i>
                                            </div>
                                        </a>
                                    </li>
                                `;

                                });
                                $('#boton-select').html(`Comenzar leccion: ${id}`);
                                $('#resultado').html(html);
                            },
                            error: function() {
                                $('#resultado').html('<span class="text-danger">Material no encontrado</span>');
                            }
                        });
                    }



                    $(document).ready(function() {
                        cargarMaterial(1);

                        $('.material-div').on('click', function() {
                            const id = $(this).data('id');
                            cargarMaterial(id);
                        });
                    });
                </script>



                <!-- Path Container Vertical -->
                <div class="position-relative mb-5 d-flex justify-content-center">
                    <!-- Path Line Vertical -->


                    <div class="d-flex flex-column align-items-center gap-2">


                        <div class="material-div d-flex flex-column align-items-center position-relative" data-id="1">
                            <a href="#" class="nivel-link">
                                <img class="container-img" src="{{ asset('/assets/img/camino-serpiente/boton 1.png') }}"
                                    alt="" width="80">
                            </a>
                            <div class="crown position-absolute top-0 end-0 translate-middle bg-success p-1 rounded-circle">
                                <i class="fas fa-crown text-white" style="font-size: 10px;"></i>
                            </div>
                            <div
                                class="level-badge position-absolute bottom-0 start-50 translate-middle-x bg-white px-1 rounded-pill small">
                                Nivel 1
                            </div>
                            <span class="small fw-medium mt-2">.</span>
                        </div>
                        <div class="material-div d-flex flex-column align-items-center position-relative"
                            style="margin-left: 50px;" data-id="2">
                            <a href="#" class="nivel-link">
                                <img class="container-img-lock"
                                    src="{{ asset('/assets/img/camino-serpiente/bloqueado.png') }}" alt=""
                                    width="80">
                            </a>
                            <div class="crown position-absolute top-0 end-0 translate-middle bg-success p-1 rounded-circle">
                                <i class="fas fa-crown text-white" style="font-size: 10px;"></i>
                            </div>
                            <div
                                class="level-badge position-absolute bottom-0 start-50 translate-middle-x bg-white px-1 rounded-pill small">
                                Nivel 2
                            </div>
                            <span class="small fw-medium mt-2">.</span>
                        </div>



                        <!-- Level Template -->
                        <div class="material-div d-flex flex-column align-items-center position-relative"
                            style="margin-left: -50px;" data-id="3">
                            <a href="#" class="nivel-link">
                                <img class="container-img-lock"
                                    src="{{ asset('/assets/img/camino-serpiente/bloqueado.png') }}" alt=""
                                    width="80">
                            </a>
                            <div class="crown position-absolute top-0 end-0 translate-middle bg-success p-1 rounded-circle">
                                <i class="fas fa-crown text-white" style="font-size: 10px;"></i>
                            </div>
                            <div
                                class="level-badge position-absolute bottom-0 start-50 translate-middle-x bg-white px-1 rounded-pill small">
                                Nivel 3
                            </div>
                            <span class="small fw-medium mt-2">.</span>
                        </div>



                        <div class="material-div d-flex flex-column align-items-center position-relative"
                            style="margin-left: 50px;" data-id="4">
                            <a href="#" class="nivel-3">
                                <img class="container-img-lock"
                                    src="{{ asset('/assets/img/camino-serpiente/bloqueado.png') }}" alt=""
                                    width="80">
                            </a>
                            <div
                                class="crown position-absolute top-0 end-0 translate-middle bg-success p-1 rounded-circle">
                                <i class="fas fa-crown text-white" style="font-size: 10px;"></i>
                            </div>
                            <div
                                class="level-badge position-absolute bottom-0 start-50 translate-middle-x bg-white px-1 rounded-pill small">
                                Nivel 4</div>

                            <span class="small fw-medium mt-2">.</span>
                        </div>


                        <div class="material-div d-flex flex-column align-items-center position-relative"
                            style="margin-left: -40px;" data-id="5">
                            <a href="#">
                                <img class="container-img-lock"
                                    src="{{ asset('/assets/img/camino-serpiente/bloqueado.png') }}" alt=""
                                    width="80">
                            </a>
                            <div
                                class="crown position-absolute top-0 end-0 translate-middle bg-success p-1 rounded-circle">
                                <i class="fas fa-crown text-white" style="font-size: 10px;"></i>
                            </div>
                            <div
                                class="level-badge position-absolute bottom-0 start-50 translate-middle-x bg-white px-1 rounded-pill small">
                                Nivel 5</div>

                            <span class="small fw-medium mt-2">.</span>
                        </div>
                    </div>
                </div>

                <!-- Current Lesson -->
                <section class="bg-white rounded shadow p-4 mb-4">
                    <h2 class="fs-6 fw-semibold mb-3">Lección actual: Comida</h2>
                    <button id="startLesson" class="btn btn-success w-100 fw-bold py-2 start-lesson-btn">
                        <i class="fas fa-play me-2"></i>
                        <span>Comenzar lección</span>
                    </button>
                </section>


            </div>
        </div>


        @include('content.dashboard.partials.submenu')

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


@endsection
