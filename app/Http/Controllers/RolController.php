<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
  public function index()
  {
    $permisos = Permission::all();
    $roles = Role::all();
    return view('Sistema.roles', [
      'permisos' => $permisos,
      'roles' => $roles,
    ]);
  }

  public function store(Request $request)
  {
    // dd($request);
    try {
      $role = Role::create([
        'name' => $request->input('nombre')
      ]);
      return back()->with('success', 'Rol creado correctamente.');
    } catch (\Exception $e) {
      return back()->with('error', 'Hubo un problema al crear el rol: ' . $e->getMessage());
    }
  }

  public function update(Request $request, string $id)
  {
    $role = Role::findOrFail($id);
    $role->name = $request->input('name');

    $role->syncPermissions($request->input('permissions', []));

    $role->save();

    return redirect()->route('roles.index')->with('success', 'Rol Actualizado correctamente');
  }

  public function destroy($id)
  {
    try {
      $rol = Role::findOrFail($id);
      $rol->delete();

      return redirect()->back()->with('success', 'Eliminado Correctamente');
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Error' . $e->getMessage());
    }
  }
}
