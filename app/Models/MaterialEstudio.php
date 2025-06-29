<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialEstudio extends Model
{
  use HasFactory;

  protected $table = 'materiales_estudio';

  protected $fillable = [
    'id_estudiante',
    'id_actividad',
    'nombre',
    'tiempo',
    'estado',
  ];
}
