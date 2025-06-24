<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
  public function usuarios()
  {
    $roles = Role::all();
    $usuarios = User::all();
    return view('Sistema.usuarios', [
      'usuarios' => $usuarios,
      'roles' => $roles,
    ]);
  }

  public function asignar_rol(Request $request, $id)
  {
    $usuario = User::find($id);
    if ($usuario) {
      $usuario->syncRoles($request->input('roles'));
      return redirect()->back()->with('success', 'Roles asignado correctamente');
    }
    return redirect()->back()->with('Error', 'Rol no asignado');
  }

  public function eliminar_usuario($id)
  {
    try {
      $usuario = User::findOrFail($id);
      $usuario->delete();
      return redirect()->back()->with('success', 'Usuario Eliminado Correctamente');
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
  }
}
