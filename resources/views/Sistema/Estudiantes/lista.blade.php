@extends('layouts/layoutMaster')

@section('title', 'User List - Pages')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
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
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title">Lista de Usuarios</h5>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="row">
                    <div class="col-sm-8 col-lg-10">
                        <div class="mb-2"><button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal9">Crear nuevo estudiante</button></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-users table">
                <tdead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Carnet</th>
                        <th>Celular</th>
                        <th>Edad</th>
                        <th>Acciones</th>
                    </tr>
                </tdead>
                <tbody>
                    @foreach ($estudiantes as $index => $estudiante)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $estudiante->nombre }} {{ $estudiante->apellido }}</td>
                            <td>{{ $estudiante->correo }}</td>
                            <td>{{ $estudiante->carnet }}</td>
                            <td>{{ $estudiante->celular }}</td>
                            <td>{{ $estudiante->edad }}</td>


                            <td class="d-flex gap-1">
                                <button type="button" class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#editRolesModal-{{ $estudiante->id }}">
                                    <i class="fas fa-user-edit text-dark me-2"></i>Editar estudiante
                                </button>
                                <form action="{{ route('eliminar_estudiante', $estudiante->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-pill">
                                        <i class="tf-icons mdi mdi-delete-outline me-1"></i> Eliminar
                                    </button>
                                </form>
                                <button type="button" class="btn btn-warning btn-sm rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#modalActualizarEstudiante-{{ $estudiante->id }}">
                                    <i class="tf-icons mdi mdi-pencil-outline me-1"></i> Actualizar
                                </button>

                            </td>
                        </tr>

                        <div class="modal fade" id="modalActualizarEstudiante-{{ $estudiante->id }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('actualizar_estudiante', $estudiante->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Actualizar Estudiante</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <label class="form-label">Nombre</label>
                                                <input type="text" name="nombre" class="form-control"
                                                    value="{{ $estudiante->nombre }}" required>
                                            </div>
                                            <div>
                                                <label class="form-label">Apellido</label>
                                                <input type="text" name="apellido" class="form-control"
                                                    value="{{ $estudiante->apellido }}" required>
                                            </div>
                                            <div>
                                                <label class="form-label">Carnet</label>
                                                <input type="text" name="carnet" class="form-control"
                                                    value="{{ $estudiante->carnet }}" required>
                                            </div>
                                            <div>
                                                <label class="form-label">Correo</label>
                                                <input type="email" name="correo" class="form-control"
                                                    value="{{ $estudiante->correo }}" required>
                                            </div>
                                            <div>
                                                <label class="form-label">Edad</label>
                                                <input type="number" name="edad" class="form-control"
                                                    value="{{ $estudiante->edad }}" required>
                                            </div>
                                            <div>
                                                <label class="form-label">Celular</label>
                                                <input type="number" name="celular" class="form-control"
                                                    value="{{ $estudiante->celular }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success" type="submit">Actualizar</button>
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

    {{-- MODAL PARA AGREGAR UN NUEVO ROL --}}
    <div class="modal fade" id="modal9">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('crear_estudiante') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Crear nuevo Estudiante</h5>
                        <button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal">
                            <i class="mdi mdi-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label class="form-label" for="nombre">Nombre del Estudiante</label>
                            <input class="form-control" id="nombre" type="text" name="nombre" required>
                            <small class="form-text">Escriba el nuevo nombre del estudiante</small>
                        </div>
                        <div>
                            <label for="apellido" class="form-label">Apellido del Estudiante</label>
                            <input class="form-control" id="apellido" name="apellido" type="text" required>
                            <small class="form-text">Escriba el apellido del estudiante</small>
                        </div>
                        <div>
                            <label for="carnet" class="form-label">Carnet</label>
                            <input type="text" id="carnet" name="carnet" class="form-control" required>
                            <small class="form-text">Escriba el carnet del estudiante</small>
                        </div>
                        <div>
                            <label for="correo" class="form-label">Correo</label>
                            <input type="text" id="correo" name="correo" class="form-control" required>
                            <small class="form-text">Ingrese en correo del estudiante</small>
                        </div>
                        <div>
                            <label for="edad" class="form-label">Edad</label>
                            <input type="number" id="edad" name="edad" class="form-control" required>
                            <small class="form-text">Ingrese la edad del estudiante</small>
                        </div>
                        <div>
                            <label for="celular" class="form-label">Número celular</label>
                            <input type="number" id="celular" name="celular" class="form-control" required>
                            <small class="form-text">Ingrese el telefono del estudiante</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-outline-danger" type="reset">Restablecer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6'
            });
        @elseif (session('error'))
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33'
            });
        @endif
    </script>
@endsection
