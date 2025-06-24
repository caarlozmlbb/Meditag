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
            <h5 class="card-title">Roles del Sistema</h5>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-4 user_role"></div>
                <div class="col-md-4 user_plan"></div>
                <div class="col-md-4 user_status"></div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-lg-10">
                    <div class="mb-2"><button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal8">Crear nuevo rol</button></div>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-users table">
                <tdead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre Rol</th>
                        <th>Permisos</th>
                        <th>Acciones</th>
                    </tr>
                </tdead>
                <tbody>
                    @forelse ($roles as $rol)
                        <tr>
                            <td>{{ $rol->id }}</td>
                            <td>{{ $rol->name }}</td>
                            <td>
                                @if ($rol->permissions->isNotEmpty())
                                    @foreach ($rol->permissions as $permission)
                                        <span class="badge bg-primary">{{ $permission->name }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">Sin permisos</span>
                                @endif
                            </td>
                            <td>
                                <a href="#editRoleModal-{{ $rol->id }}" class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal">
                                    Editar
                                </a>
                                <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de eliminar este rol?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
        </div>
        </tbody>
        </table>
    </div>

    </div>

    {{-- MODAL PARA AGREGAR UN NUEVO ROL --}}
    <div class="modal fade" id="modal8">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Crear nuevo Rol</h5>
                        <button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal">
                            <i class="mdi mdi-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label class="form-label" for="nombre">Nombre del Rol</label>
                            <input class="form-control" id="nombre" type="text" name="nombre" required>
                            <small class="form-text">Escriba el nuevo nombre de rol que desea agregar</small>
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
@endsection
