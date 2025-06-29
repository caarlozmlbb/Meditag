<!-- Right Side Cards -->
<div class="col-xl-4">
    <div class="d-flex flex-column gap-4">
        <!-- Card 1 - Panel de Aprendizaje -->
        <div class="card shadow-lg border-0">
            <div class="card-header bg-gradient bg-primary text-white border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-2 fw-bold" style="color: #f9f9fd ">
                            🎯 Material de Estudio
                        </h4>
                        <p class="text-muted mb-0">¡Bienvenido {{ auth()->user()->name }}!</p>
                    </div>

                    <div class="badge bg-success-subtle text-success px-3 py-2">
                        <i class="fas fa-chart-line me-1"></i>
                        Progresando
                    </div>
                </div>
            </div>
            <div class="card-body position-relative">
                <div class="col app-email-sidebar border-end-0 flex-grow-0" id="app-email-sidebar">
                    <div class="email-filters pt-2 pb-2">
                        <ul class="email-filter-folders list-unstyled" id="resultado">
                            <!-- Aquí se renderiza con JS -->
                        </ul>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="small fw-semibold">Progreso Semanal</span>
                                <span class="small text-muted">78%</span>
                            </div>



                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-gradient bg-success" style="width: 78%"></div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>









        <!-- Card 2 - Modelo 3D Interactivo -->
        <div class="card shadow-lg border-0">
            <div class="card-header bg-gradient bg-primary text-white border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-1">
                            <i class="fas fa-brain me-2"></i>Modelo 3D Interactivo
                        </h5>
                        <small class="opacity-75">Explora la anatomía en detalle</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-outline-light btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-cog"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-expand me-2"></i>Pantalla
                                    completa</a></li>
                            <li><a class="dropdown-item" href="#"><i
                                        class="fas fa-download me-2"></i>Descargar</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-share me-2"></i>Compartir</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="position-relative">
                    <model-viewer src="{{ asset('assets/models3D/personaje/repo.glb') }}"
                        alt="🧠 Modelo 3D del Cráneo en Movimiento" auto-rotate autoplay camera-controls exposure="0.6"
                        environment-image="neutral" shadow-intensity="0.8"
                        style="width: 100%; height: 350px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    </model-viewer>

                    <!-- Controles superpuestos -->
                    <div class="position-absolute top-0 start-0 m-3">
                        <div class="btn-group-vertical">
                            <button class="btn btn-sm btn-light shadow-sm mb-1" title="Rotar">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <button class="btn btn-sm btn-light shadow-sm mb-1" title="Zoom">
                                <i class="fas fa-search-plus"></i>
                            </button>
                            <button class="btn btn-sm btn-light shadow-sm" title="Resetear">
                                <i class="fas fa-home"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="text-center">
                                <div class="h4 text-primary mb-1">360°</div>
                                <small class="text-muted">Rotación</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center">
                                <div class="h4 text-success mb-1">HD</div>
                                <small class="text-muted">Calidad</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center">
                                <div class="h4 text-info mb-1">3D</div>
                                <small class="text-muted">Dimensiones</small>
                            </div>
                        </div>
                    </div>

                    <p class="card-text mt-3 text-muted">
                        <i class="fas fa-info-circle me-2 text-primary"></i>
                        Explora este modelo 3D interactivo con controles táctiles. Puedes rotar, hacer zoom y examinar
                        cada detalle.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 3 - Panel de Estadísticas -->
        <div class="card shadow-lg border-0">
            <div class="card-header bg-gradient bg-success text-white border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-1">
                            <i class="fas fa-chart-bar me-2"></i>Progreso de Aprendizaje
                        </h5>
                        <small class="opacity-75">Tu evolución esta semana</small>
                    </div>
                    <span class="badge bg-light text-success px-3">+15%</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 45px; height: 45px;">
                                <i class="fas fa-play-circle"></i>
                            </div>
                            <div>
                                <div class="h5 mb-0 text-primary">24</div>
                                <small class="text-muted">Videos vistos</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 45px; height: 45px;">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <div class="h5 mb-0 text-success">12h</div>
                                <small class="text-muted">Tiempo estudio</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 45px; height: 45px;">
                                <i class="fas fa-medal"></i>
                            </div>
                            <div>
                                <div class="h5 mb-0 text-warning">8</div>
                                <small class="text-muted">Logros</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper bg-info-subtle text-info rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 45px; height: 45px;">
                                <i class="fas fa-fire"></i>
                            </div>
                            <div>
                                <div class="h5 mb-0 text-info">5</div>
                                <small class="text-muted">Racha días</small>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="small fw-semibold">Progreso Semanal</span>
                        <span class="small text-muted">78%</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-gradient bg-success" style="width: 78%"></div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-chart-line me-1"></i>Ver detalles
                    </button>
                    <button class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-1"></i>Nueva meta
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
