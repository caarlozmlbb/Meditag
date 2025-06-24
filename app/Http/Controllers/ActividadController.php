<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActividadController extends Controller
{
  public function actividades()
  {
    return view('actividades.actividad');
  }

  public function estructura_curso()
  {
    return view('Temas.seleccion');
  }
}
