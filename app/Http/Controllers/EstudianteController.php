<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\get;
use function PHPSTORM_META\map;

class EstudianteController extends Controller
{
  public function estudiantes()
  {
    $estudiantes = Estudiante::all();
    return view('Sistema.Estudiantes.lista', [
      'estudiantes' => $estudiantes,
    ]);
  }

  public function eliminar_estudiante(Request $request, $id)
  {
    try {
      $estudiate =  Estudiante::findOrFail($id);
      $estudiate->delete();

      return redirect()->back()->with('success', 'Eliminado Correctamente');
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
  }

  public function crear_estudiante(Request $request)
  {
    try {
      $request->validate([
        'nombre' => 'required|string',
        'apellido' => 'required|string',
        'carnet' => 'required|string',
        'celular' => 'required|numeric',
        'correo' => 'required|email',
        'edad' => 'required|numeric'
      ]);

      $estudiante = new Estudiante();
      $estudiante->nombre = $request->nombre;
      $estudiante->apellido = $request->apellido;
      $estudiante->carnet = $request->carnet;
      $estudiante->correo = $request->correo;
      $estudiante->celular = $request->celular;
      $estudiante->edad = $request->edad;
      $estudiante->save();

      $user = User::create([
        'name' => $request->nombre . ' ' . $request->apellido,
        'email' => $request->correo,
        'password' => Hash::make($request->carnet),
      ]);

      $user->assignRole('Estudiante');

      return redirect()->back()->with('success', 'Estudiante creado con exito');
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Error' . $e->getMessage());
    }
  }

  public function update(Request $request, $id)
  {
    $estudiante = Estudiante::findOrFail($id);

    $request->validate([
      'nombre' => 'required|string',
      'apellido' => 'required|string',
      'carnet' => 'required|string',
      'correo' => 'required|email',
      'edad' => 'required|integer',
      'celular' => 'required|numeric',
    ]);

    $estudiante->update([
      'nombre' => $request->nombre,
      'apellido' => $request->apellido,
      'carnet' => $request->carnet,
      'correo' => $request->correo,
      'edad' => $request->edad,
      'celular' => $request->celular,
    ]);

    return redirect()->back()->with('success', 'Estudiante actualizado correctamente.');
  }
}
