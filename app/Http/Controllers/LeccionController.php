<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeccionController extends Controller
{
  public function leccion1()
  {
    return view('Temas.lecciones.leccion1');
  }
}
