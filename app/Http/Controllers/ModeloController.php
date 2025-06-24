<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModeloController extends Controller
{
  public function ojos()
  {
    return view('Temas.ojos');
  }

  public function craneo()
  {
    return view('Temas.craneo');
  }

  public function vista_organos_internos()
  {
    return view('Temas.3Dvistas.organosInternos');
  }

  public function vista_ojo_humano()
  {
    return view('Temas.3Dvistas.ojos');
  }

  public function vista_craneo()
  {
    return view('Temas.3Dvistas.craneo');
  }
  public function vista_esqueleto()
  {
    return view('Temas.3Dvistas.esqueleto');
  }
}
