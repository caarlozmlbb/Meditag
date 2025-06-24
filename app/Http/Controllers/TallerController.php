<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TallerController extends Controller
{
    public function vista_taller(){
      return view('Temas.taller.vista_taller');
    }
}
