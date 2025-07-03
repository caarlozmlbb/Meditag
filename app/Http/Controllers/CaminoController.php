<?php

namespace App\Http\Controllers;

use App\Models\MaterialEstudio;
use Illuminate\Http\Request;

class CaminoController extends Controller
{
  public function mostrar($id)
  {
    $materiales = MaterialEstudio::where('id_actividad', $id)->get();

    if ($materiales->isEmpty()) {
      return response()->json(['error' => 'No encontradoss'], 404);
    }

    return response()->json($materiales);
  }

  public function cards()
  {
    return view('content.cards.estudioCards');
  }

  public function mostrarTema($nombre, $nivel)
  {
    if ($nombre == 'cartas_magicas') {
      return view('content.cards.estudioCards');
    } elseif ($nombre == 'video') {
      return view('Temas.MaterialEstuio.video');
    }
  }
}
