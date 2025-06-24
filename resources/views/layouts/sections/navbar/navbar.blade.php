@php
    $containerNav = $containerNav ?? 'container-fluid';
    $navbarDetached = $navbarDetached ?? '';
@endphp

<!-- Navbar -->
@if (isset($navbarDetached) && $navbarDetached == 'navbar-detached')
    <nav class="layout-navbar {{ $containerNav }} navbar navbar-expand-xl {{ $navbarDetached }} align-items-center bg-navbar-theme"
        id="layout-navbar">
@endif
@if (isset($navbarDetached) && $navbarDetached == '')
    <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="{{ $containerNav }}">
@endif

<!--  Brand demo (display only for navbar-full and hide on below xl) -->
@if (isset($navbarFull))
    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="{{ url('/') }}" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">@include('_partials.macros', ['width' => 25, 'withbg' => 'var(--bs-primary)'])</span>
            <span class="app-brand-text demo menu-text fw-bold">{{ config('variables.templateName') }}</span>
        </a>
        @if (isset($menuHorizontal))
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="mdi mdi-close align-middle"></i>
            </a>
        @endif
    </div>
@endif

<!-- ! Not required for layout-without-menu -->
@if (!isset($navbarHideToggle))
    <div
        class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ? ' d-xl-none ' : '' }}">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="mdi mdi-menu mdi-24px"></i>
        </a>
    </div>
@endif

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

    @if (!isset($menuHorizontal))
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item navbar-search-wrapper mb-0">
                <a class="nav-item nav-link search-toggler fw-normal px-0" href="javascript:void(0);">
                    <i class="mdi mdi-magnify mdi-24px scaleX-n1-rtl"></i>
                    <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                </a>
            </div>
        </div>
        <!-- /Search -->
    @endif

    <ul class="navbar-nav flex-row align-items-center ms-auto">
        @if (isset($menuHorizontal))
            <!-- Search -->
            <li class="nav-item navbar-search-wrapper me-1 me-xl-0">
                <a class="nav-link search-toggler fw-normal" href="javascript:void(0);">
                    <i class="mdi mdi-magnify mdi-24px scaleX-n1-rtl"></i>
                </a>
            </li>
            <!-- /Search -->
        @endif

        @if ($configData['hasCustomizer'] == true)
            <!-- Style Switcher -->
            <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow"
                    href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class='mdi mdi-24px'></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                            <span class="align-middle"><i class='mdi mdi-weather-sunny me-2'></i>Light</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                            <span class="align-middle"><i class="mdi mdi-weather-night me-2"></i>Dark</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                            <span class="align-middle"><i class="mdi mdi-monitor me-2"></i>System</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ Style Switcher -->
        @endif

        <!-- Reemplaza tu código actual con este -->
        <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-1 me-xl-0">
            <a class="btn-slide" href="#">
                <span class="circle">
                    <i class="fa fa-volume-up"></i>
                </span>
                <span class="title">Sonido ON</span>
                <span class="title title-hover">Sonido OFF</span>
            </a>
        </li>

        <style>
            /* CSS mejorado para el botón con estado persistente */
            .btn-slide {
                position: relative;
                display: inline-block;
                height: 40px;
                width: 130px;
                line-height: 40px;
                margin: 0;
                padding: 0;
                border-radius: 20px;
                box-shadow: 0 6px 15px -5px rgba(0, 0, 0, 0.5);
                background: linear-gradient(135deg, #e570e7 0%, #79f1fc 100%);
                text-decoration: none;
                overflow: hidden;
                vertical-align: middle;
                transition: background 0.3s ease;
            }

            .btn-slide:active {
                box-shadow: 0 4px 10px -5px rgba(0, 0, 0, 0.5);
                transform: scale(0.96);
            }

            .btn-slide:hover {
                background: linear-gradient(-135deg, #e570e7 0%, #79f1fc 100%);
                text-decoration: none;
            }

            /* Estado activo del botón */
            .btn-slide.active {
                background: linear-gradient(-135deg, #e570e7 0%, #79f1fc 100%);
            }

            .btn-slide span.circle {
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #fff;
                color: #e570e7;
                position: absolute;
                margin: 3px;
                height: 34px;
                width: 34px;
                top: 0;
                left: 0;
                border-radius: 50%;
                transition: all 0.8s cubic-bezier(0.25, 0.8, 0.25, 1);
                font-size: 14px;
            }

            /* Posición del círculo cuando está activo (ON) */
            .btn-slide.active span.circle {
                left: calc(100% - 37px);
                color: #79f1fc;
            }

            /* Efecto hover solo cuando NO está activo */
            .btn-slide:not(.active):hover span.circle {
                left: calc(100% - 37px);
                color: #79f1fc;
            }

            .btn-slide span.title {
                font-family: 'Nunito Sans', sans-serif;
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                left: 42px;
                right: 8px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: 0.3px;
                color: #fff;
                text-align: center;
                transition: all 0.8s cubic-bezier(0.25, 0.8, 0.25, 1);
                white-space: nowrap;
                opacity: 1;
            }

            .btn-slide span.title-hover {
                opacity: 0;
                left: 8px;
                right: 42px;
            }

            /* Estados de texto cuando está activo */
            .btn-slide.active span.title {
                opacity: 0;
                transform: translateY(-50%) translateX(-8px);
            }

            .btn-slide.active span.title-hover {
                opacity: 1;
                transform: translateY(-50%) translateX(0);
            }

            /* Efecto hover en texto solo cuando NO está activo */
            .btn-slide:not(.active):hover span.title {
                opacity: 0;
                transform: translateY(-50%) translateX(-8px);
            }

            .btn-slide:not(.active):hover span.title-hover {
                opacity: 1;
                transform: translateY(-50%) translateX(0);
            }

            /* Alineación con navbar */
            .navbar-nav .nav-item .btn-slide {
                margin-top: 0;
                margin-bottom: 0;
            }

            /* Responsive design optimizado para navbar */
            @media (max-width: 768px) {
                .btn-slide {
                    width: 120px;
                    height: 36px;
                    line-height: 36px;
                    border-radius: 18px;
                }

                .btn-slide span.circle {
                    height: 30px;
                    width: 30px;
                    margin: 3px;
                    font-size: 12px;
                }

                .btn-slide.active span.circle,
                .btn-slide:not(.active):hover span.circle {
                    left: calc(100% - 33px);
                }

                .btn-slide span.title {
                    font-size: 10px;
                    left: 38px;
                    right: 6px;
                }

                .btn-slide span.title-hover {
                    left: 6px;
                    right: 38px;
                }
            }

            @media (max-width: 480px) {
                .btn-slide {
                    width: 110px;
                    height: 32px;
                    line-height: 32px;
                    border-radius: 16px;
                }

                .btn-slide span.circle {
                    height: 26px;
                    width: 26px;
                    margin: 3px;
                    font-size: 11px;
                }

                .btn-slide.active span.circle,
                .btn-slide:not(.active):hover span.circle {
                    left: calc(100% - 29px);
                }

                .btn-slide span.title {
                    font-size: 9px;
                    left: 34px;
                    right: 5px;
                }

                .btn-slide span.title-hover {
                    left: 5px;
                    right: 34px;
                }
            }

            /* Eliminar estilos de lista si es necesario */
            .navbar-nav .nav-item {
                list-style: none;
            }
        </style>

        <script>
            // Script mejorado para controlar la música con estado persistente
            document.addEventListener('DOMContentLoaded', function() {
                // Crear elemento de audio
                const backgroundMusic = new Audio('/assets/audio/MUSICA.mp3');
                backgroundMusic.loop = true;
                backgroundMusic.volume = 0.3;

                // Obtener elementos del botón
                const soundButton = document.querySelector('.btn-slide');
                const circle = soundButton.querySelector('.circle');
                const circleIcon = soundButton.querySelector('.circle i');
                const titleOn = soundButton.querySelector('.title:not(.title-hover)');
                const titleOff = soundButton.querySelector('.title-hover');

                // Estado inicial
                let isMusicPlaying = false;

                // Función para actualizar el estado visual del botón
                function updateButtonState(isOn) {
                    if (isOn) {
                        // Estado ON - círculo a la derecha
                        soundButton.classList.add('active');
                        circle.style.left = 'calc(100% - 37px)';
                        circle.style.color = '#79f1fc';
                        circleIcon.className = 'fa fa-volume-up';
                        titleOn.style.opacity = '0';
                        titleOff.style.opacity = '1';
                        titleOn.textContent = 'Sonido ON';
                        titleOff.textContent = 'Sonido OFF';
                    } else {
                        // Estado OFF - círculo a la izquierda
                        soundButton.classList.remove('active');
                        circle.style.left = '0';
                        circle.style.color = '#e570e7';
                        circleIcon.className = 'fa fa-volume-mute';
                        titleOn.style.opacity = '1';
                        titleOff.style.opacity = '0';
                        titleOn.textContent = 'Sonido OFF';
                        titleOff.textContent = 'Sonido ON';
                    }
                }

                // Función para alternar música
                function toggleMusic() {
                    if (isMusicPlaying) {
                        // Pausar música
                        backgroundMusic.pause();
                        isMusicPlaying = false;
                        updateButtonState(false);
                        localStorage.setItem('musicEnabled', 'false');
                    } else {
                        // Reproducir música
                        backgroundMusic.play().then(() => {
                            isMusicPlaying = true;
                            updateButtonState(true);
                            localStorage.setItem('musicEnabled', 'true');
                        }).catch(function(error) {
                            console.log('Error al reproducir audio:', error);
                            // En caso de error, mantener el estado visual correcto
                            updateButtonState(false);
                            localStorage.setItem('musicEnabled', 'false');
                            alert(
                                'Tu navegador requiere interacción del usuario para reproducir audio. Haz clic nuevamente.'
                            );
                        });
                    }
                }

                // Cargar estado guardado al iniciar
                function loadSavedState() {
                    const savedState = localStorage.getItem('musicEnabled');
                    if (savedState === 'true') {
                        // Reproducir música automáticamente si estaba activada
                        backgroundMusic.play().then(() => {
                            isMusicPlaying = true;
                            updateButtonState(true);
                        }).catch(() => {
                            // Si no puede reproducir automáticamente, mantener estado OFF visualmente
                            isMusicPlaying = false;
                            updateButtonState(false);
                            localStorage.setItem('musicEnabled', 'false');
                        });
                    } else {
                        // Estado OFF por defecto
                        isMusicPlaying = false;
                        updateButtonState(false);
                    }
                }

                // Event listener para el botón
                soundButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    toggleMusic();
                });

                // Cargar estado al iniciar la página
                loadSavedState();

                // Control de volumen con rueda del mouse (opcional)
                soundButton.addEventListener('wheel', function(e) {
                    if (isMusicPlaying) {
                        e.preventDefault();
                        if (e.deltaY < 0) {
                            backgroundMusic.volume = Math.min(backgroundMusic.volume + 0.1, 1);
                        } else {
                            backgroundMusic.volume = Math.max(backgroundMusic.volume - 0.1, 0);
                        }

                        // Mostrar volumen actual brevemente
                        const volumePercent = Math.round(backgroundMusic.volume * 100);
                        titleOn.textContent = `Vol: ${volumePercent}%`;
                        titleOff.textContent = `Vol: ${volumePercent}%`;

                        // Restaurar texto después de 1 segundo
                        setTimeout(() => {
                            if (isMusicPlaying) {
                                titleOn.textContent = 'Sonido ON';
                                titleOff.textContent = 'Sonido OFF';
                            } else {
                                titleOn.textContent = 'Sonido OFF';
                                titleOff.textContent = 'Sonido ON';
                            }
                        }, 1000);
                    }
                });

                // Manejar errores de carga
                backgroundMusic.addEventListener('error', function(e) {
                    console.error('Error al cargar el archivo de audio:', e);
                    updateButtonState(false);
                    localStorage.setItem('musicEnabled', 'false');
                    alert(
                        'No se pudo cargar el archivo de música. Verifica que musica.mp3 esté en la carpeta public.'
                    );
                });

                // Manejar cuando la música termina (si no está en loop)
                backgroundMusic.addEventListener('ended', function() {
                    if (!backgroundMusic.loop) {
                        isMusicPlaying = false;
                        updateButtonState(false);
                        localStorage.setItem('musicEnabled', 'false');
                    }
                });

                // Opcional: Pausar música cuando se cambia de pestaña (mantener estado visual)
                document.addEventListener('visibilitychange', function() {
                    if (document.hidden && isMusicPlaying) {
                        backgroundMusic.pause();
                    } else if (!document.hidden && isMusicPlaying) {
                        backgroundMusic.play().catch(() => {
                            // Si hay error al reanudar, actualizar estado
                            isMusicPlaying = false;
                            updateButtonState(false);
                            localStorage.setItem('musicEnabled', 'false');
                        });
                    }
                });

                // Detectar si el usuario interactúa con la página para activar audio automático
                let userInteracted = false;
                document.addEventListener('click', function() {
                    if (!userInteracted) {
                        userInteracted = true;
                        // Si había música guardada como ON, intentar reproducir
                        if (localStorage.getItem('musicEnabled') === 'true' && !isMusicPlaying) {
                            toggleMusic();
                        }
                    }
                }, {
                    once: true
                });
            });
        </script>
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="{{ route('profile.edit') }}" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle">
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item"
                        href="{{ Route::has('profile.edit') ? route('profile.edit') : url('pages/profile-user') }}">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="{{ Auth::user() ? Auth::user()->profile_photo_url : asset('assets/img/avatars/1.png') }}"
                                        alt class="w-px-40 h-auto rounded-circle">
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-medium d-block">
                                    @if (Auth::check())
                                        {{ Auth::user()->name }}
                                    @else
                                        John Doe
                                    @endif
                                </span>
                                <small class="text-muted">Admin</small>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="mdi mdi-account-outline me-2"></i>
                        <span class="align-middle">Mi perfil</span>
                    </a>
                </li>

                @if (Auth::check())
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class='mdi mdi-logout me-2'></i>
                            <span class="align-middle">Desconectase</span>
                        </a>
                    </li>
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                @else
                    <li>
                        <a class="dropdown-item"
                            href="{{ Route::has('login') ? route('login') : url('auth/login-basic') }}">
                            <i class='mdi mdi-login me-2'></i>
                            <span class="align-middle">Login</span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
        <!--/ User -->
    </ul>
</div>


<!-- Search Small Screens -->
<div class="navbar-search-wrapper search-input-wrapper {{ isset($menuHorizontal) ? $containerNav : '' }} d-none">
    <input type="text" class="form-control search-input {{ isset($menuHorizontal) ? '' : $containerNav }} border-0"
        placeholder="Search..." aria-label="Search...">
    <i class="mdi mdi-close search-toggler cursor-pointer"></i>
</div>
@if (!isset($navbarDetached))
    </div>
@endif
</nav>
<!-- / Navbar -->
