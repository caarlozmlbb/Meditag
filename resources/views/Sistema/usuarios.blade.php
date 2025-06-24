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
                <div class="col-md-4 user_role"></div>
                <div class="col-md-4 user_plan"></div>
                <div class="col-md-4 user_status"></div>
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
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </tdead>
                <tbody>
                    @foreach ($usuarios as $index => $usuario)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->carnet }}</td>
                            <td>
                                @if ($usuario->roles->isNotEmpty())
                                    @foreach ($usuario->roles as $rol)
                                        <span class="badge btn btn-info">{{ $rol->name }}</span>
                                    @endforeach
                                @else
                                    <span class="badge bg-secondary">Sin roles</span>
                                @endif
                            </td>

                            <td class="d-flex gap-1">
                                <button type="button" class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#editRolesModal-{{ $usuario->id }}">
                                    <i class="fas fa-user-edit text-dark me-2"></i>Editar Roles
                                </button>
                                <form action="{{ route('eliminar_usuario', $usuario->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-pill">
                                        <i class="tf-icons mdi mdi-delete-outline me-1"></i> Eliminar
                                    </button>
                                </form>
                                <button type="button" class="btn btn-warning btn-sm rounded-pill">
                                    <i class="tf-icons mdi mdi-pencil-outline me-1"></i> Actualizar
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="editRolesModal-{{ $usuario->id }}" tabindex="-1"
                            aria-labelledby="editRolesModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editRolesModalLabel">Editar Roles de
                                            {{ $usuario->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('asignar_rol', $usuario->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="roles" class="form-label">Roles
                                                    disponibles</label>
                                                <div>
                                                    @foreach ($roles as $rol)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="rol_{{ $rol->id }}" name="roles[]"
                                                                value="{{ $rol->name }}"
                                                                @if ($usuario->hasRole($rol->name)) checked @endif>
                                                            <label class="form-check-label" for="rol_{{ $rol->id }}">
                                                                {{ $rol->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar
                                                cambios</button>
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
@endsection
