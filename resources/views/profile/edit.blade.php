@extends('layouts/layoutMaster')

@section('title', 'User Profile - Profile')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
@endsection

<!-- Page -->
@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}" />
@endsection


@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-user-view-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">User Profile /</span> Profile
    </h4>

    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img src="{{ asset('assets/img/pages/profile-banner.png') }}" alt="Banner image" class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ auth()->user()->name }}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item">
                                        <i class='mdi mdi-invert-colors me-1 mdi-20px'></i><span class="fw-medium">UX
                                            Designer</span>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class='mdi mdi-map-marker-outline me-1 mdi-20px'></i><span
                                            class="fw-medium">Vatican City</span>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class='mdi mdi-calendar-blank-outline me-1 mdi-20px'></i><span class="fw-medium">
                                            Joined April 2021</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-primary">
                                <i class='mdi mdi-account-check-outline me-1'></i>Connected
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    <!-- Navbar pills -->
    {{-- <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                            class='mdi mdi-account-outline me-1 mdi-20px'></i>Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('pages/profile-teams') }}"><i
                            class='mdi mdi-account-multiple-outline me-1 mdi-20px'></i>Teams</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('pages/profile-projects') }}"><i
                            class='mdi mdi-view-grid-outline me-1 mdi-20px'></i>Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('pages/profile-connections') }}"><i
                            class='mdi mdi-link me-1 mdi-20px'></i>Connections</a></li>
            </ul>
        </div>
    </div> --}}
    <!--/ Navbar pills -->

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="card-text text-uppercase">Tus datos</small>
                    <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-3"><i class="mdi mdi-account-outline mdi-24px"></i><span
                                class="fw-medium mx-2">Nombre:</span> <span>{{ auth()->user()->name }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="mdi mdi-check mdi-24px"></i><span
                                class="fw-medium mx-2">Correo:</span> <span>{{ auth()->user()->email }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="mdi mdi-star-outline mdi-24px"></i><span
                                class="fw-medium mx-2">Role:</span> <span>Developer</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="mdi mdi-flag-outline mdi-24px"></i><span
                                class="fw-medium mx-2">Country:</span> <span>USA</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="mdi mdi-translate mdi-24px"></i><span
                                class="fw-medium mx-2">Languages:</span> <span>English</span></li>
                    </ul>
                    <small class="card-text text-uppercase">Contacts</small>
                    <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-3"><i class="mdi mdi-phone-outline mdi-24px"></i><span
                                class="fw-medium mx-2">Contact:</span> <span>(123) 456-7890</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="mdi mdi-message-outline mdi-24px"></i><span
                                class="fw-medium mx-2">Skype:</span> <span>john.doe</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="mdi mdi-email-outline mdi-24px"></i><span
                                class="fw-medium mx-2">Email:</span> <span>john.doe@example.com</span></li>
                    </ul>

                </div>
            </div>
            <!--/ About User -->
        </div>
        <div class="col-xl-8 col-lg-7 col-md-7">
            <div class="card mb-4">
                {{-- <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="mdi mdi-format-list-bulleted mdi-24px me-2"></i>
                        Activity Timeline
                    </h5>
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle p-0" type="button" data-bs-toggle="dropdown">
                            <i class="mdi mdi-dots-vertical mdi-24px text-muted"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Share timeline</a></li>
                            <li><a class="dropdown-item" href="#">Suggest edits</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Report bug</a></li>
                        </ul>
                    </div>
                </div> --}}

                <div class="card-body">

                    <!-- Información del perfil -->
                    <h5>Información del perfil</h5>
                    <p class="text-muted">Actualiza el nombre y correo electrónico de tu cuenta.</p>

                    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $user->email) }}" required autocomplete="username">
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                <div class="mt-2">
                                    <small class="text-warning">Tu correo electrónico no está verificado.</small>
                                    <button form="send-verification" class="btn btn-link btn-sm">
                                        Haz clic aquí para reenviar el correo de verificación.
                                    </button>

                                    @if (session('status') === 'verification-link-sent')
                                        <div class="text-success mt-1">
                                            Se ha enviado un nuevo enlace de verificación a tu correo.
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                        @if (session('status') === 'profile-updated')
                            <span class="text-success ms-3">Guardado.</span>
                        @endif
                    </form>

                    <hr class="my-4">

                    <!-- Actualizar contraseña -->
                    <h5>Actualizar contraseña</h5>
                    <p class="text-muted">Asegúrate de usar una contraseña segura y aleatoria.</p>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Contraseña actual</label>
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                autocomplete="current-password">
                            @error('current_password', 'updatePassword')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Nueva contraseña</label>
                            <input type="password" class="form-control" id="password" name="password"
                                autocomplete="new-password">
                            @error('password', 'updatePassword')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" autocomplete="new-password">
                            @error('password_confirmation', 'updatePassword')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                        @if (session('status') === 'password-updated')
                            <span class="text-success ms-3">Contraseña actualizada.</span>
                        @endif
                    </form>

                    <hr class="my-4">

                    <!-- Eliminar cuenta -->
                    <h5>Eliminar cuenta</h5>
                    <p class="text-muted">
                        Una vez que se elimine tu cuenta, todos tus datos se perderán de forma permanente.
                        Asegúrate de descargar toda la información que necesites antes de continuar.
                    </p>

                    <!-- Botón modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteAccountModal">
                        Eliminar cuenta
                    </button>

                    <!-- Modal de confirmación -->
                    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('profile.destroy') }}">
                                @csrf
                                @method('delete')

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteAccountLabel">¿Estás seguro?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        Ingresa tu contraseña para confirmar la eliminación de tu cuenta.
                                        <div class="mt-3">
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Contraseña">
                                            @error('password', 'userDeletion')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar cuenta</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div> <!-- End card-body -->
            </div> <!-- End card -->
        </div> <!-- End col -->

    </div>
    <!--/ User Profile Content -->
@endsection
